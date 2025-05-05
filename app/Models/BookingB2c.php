<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use App\Exports\Booking\error_b2c;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;

class BookingB2c extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'awb_no',
        'payment_mode',
        'item_price',
        'cod_due',
        'receiver_name',
        'receiver_address',
        'receiver_address_2',
        'receiver_state',
        'receiver_city',
        'receiver_pincode',
        'receiver_contactno.',
        'receiver_alt_contactno',
        'item_sku',
        'item_name',
        'item_height',
        'item_length',
        'item_weight',
        'item_qty',
        'order_type',
        'client_id',
        'warehouse_id',
        'courier_name',
    ];


    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function couriers()
    {
        return $this->belongsTo(Courier::class, 'courier', 'id');
    }

    public function warehouses()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id', 'id');
    }

    // ----------------------------------------------------Boot Functions---------------------------------------------------------

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->bootNullColumnsCheck();
            $model->bootpincheck();
            $model->disputestatusforcreate();
        });

        // static::updating(function ($model) {
        //     if ($model->isDirty('client_id'))
        //     {
        //          $model->updatebootNullColumnsCheck($model->getKey());
        //         $model->updatebootpincode($model->getKey());
        //         $model->disputestatus($model->getKey());
        //     }
        // });
    }
    // checking excel
    protected static function bootNullColumnsCheck()
    {
        try {
            if (Schema::hasTable((new self)->getTable())) {
                $uniqueColumns = [
                    'id',
                    'receiver_pincode',
                    'client_id',
                    'warehouse_id',
                    'order_no',
                    'receiver_state',
                    'receiver_name',
                    'receiver_address',
                    'receiver_address_2',
                    'receiver_city',
                    'receiver_pincode',
                    'receiver_contactno',
                    'payment_mode',
                    'item_price',
                    'cod_due',
                    'item_weight',
                    'item_height',
                    'item_length',
                ];

                $excludedColumns = ['transport_mode', 'status', 'deleted_at'];

                // Fetch all records at once
                $records = static::select($uniqueColumns)->get();

                $nullableColumnsById = [];
                foreach ($records as $record) {
                    $id = $record->id;

                    // Check for nullable columns
                    $nullableColumns = array_filter($uniqueColumns, function ($column) use ($record, $excludedColumns) {
                        return !in_array($column, $excludedColumns) && is_null($record->$column);
                    });

                    if (!empty($nullableColumns)) {
                        $nullableColumnsById[$id] = $nullableColumns;
                    }
                }

                // Batch insertion for performance
                $batchData = [];
                foreach ($nullableColumnsById as $id => $nullableColumns) {
                    $batchData[] = [
                        'booking_id' => $id,
                        'response' => json_encode(array_values($nullableColumns)), // Encode as JSON array
                        'pindcode' => 'true', // Assuming pincode is always available
                    ];
                }
                if (!empty($batchData)) {
                    forword_audit_b2c::insert($batchData);
                }
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred: ' . $th->getMessage());
        }

    }

    protected static function bootpincheck()
    {
        try {
            if (Schema::hasTable((new self)->getTable())) {
                // Fetch all records at once
                $records = static::select(['id', 'receiver_pincode'])->get();

                $batchData = [];
                foreach ($records as $record) {
                    $receiverPin = $record->receiver_pincode;
                    $pinExists = Uploaded_pin::where('pincode', $receiverPin)->exists();
                    $batchData[] = [
                        'booking_id' => $record->id,
                        'pincode' => $receiverPin,
                        'status' => $pinExists ? 'true' : 'false',
                    ];
                }
                if (!empty($batchData)) {
                    forword_pincodeaudit_b2c::insert($batchData);
                }
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred: ' . $th->getMessage());
        }
    }

    protected static function disputestatusforcreate()
    {
        try {
            if (Schema::hasTable((new self)->getTable())) {
                // Fetch all records at once
                $records = static::all();
                foreach ($records as $record) {
                    $id = $record->id;
                    $check = forword_audit_b2c::where('booking_id', $id)->exists();
                    // $check_and_update = forword_pincodeaudit_b2c::where(['booking_id' => $id, 'status' => '0'])->exists();
                    BookingB2c::where('id', $id)->update(['disputed_status' => $check ? 'false' : 'true']);
                }
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred: ' . $th->getMessage());
        }
    }


    // ------------------------------------------------------All update Functions-----------------------------------------------------

    protected static function updatebootNullColumnsCheck($booking_id)
    {
        try {
            $columns = Schema::getColumnListing((new self)->getTable());
            $customColumns = [
                'client_id',
                'warehouse_id',
                'order_no',
                'receiver_state',
                'receiver_name',
                'receiver_address',
                'receiver_address_2',
                'receiver_city',
                'receiver_pincode',
                'receiver_contactno',
                'receiver_contactno',
                'payment_mode',
                'item_price',
                'cod_due',
                'item_weight',
                'item_height',
                'item_length',
            ];

            $excludedColumns = ['status', 'deleted_at'];

            $uniqueColumns = array_merge(['id'], $customColumns);

            $nullableColumnsById = [];

            $records = static::select(['id'] + $uniqueColumns)->where('id', $booking_id)->get();

            foreach ($records as $record) {
                $id = $record->id;

                $nullableColumns = array_filter($uniqueColumns, function ($column) use ($record, $excludedColumns) {
                    return !in_array($column, $excludedColumns) && is_null($record->$column);
                });

                if (!empty($nullableColumns)) {
                    $existingAudit = forword_audit_b2c::where('booking_id', $id)->first();
                    $pincodeServiceable = true;

                    if (!$existingAudit) {
                        forword_audit_b2c::create([
                            'booking_id' => $id,
                            'response' => json_encode($nullableColumns),
                            'pindcode' => $pincodeServiceable ? 'true' : 'false',
                        ]);

                        Log::info("New audit record created for booking_id: $id");
                    } else {
                        if (empty(json_encode($nullableColumns))) {
                            forword_audit_b2c::where('booking_id', $id)->delete();
                            Log::info("Audit record deleted for booking_id: $id");
                        } else {
                            $existingAudit->update([
                                'response' => json_encode($nullableColumns),
                                'pindcode' => $pincodeServiceable ? 'true' : 'false',
                            ]);

                            Log::info("Audit record updated for booking_id: $id");
                        }
                    }
                } else {
                    forword_audit_b2c::where('booking_id', $id)->delete();
                    Log::info("Audit record deleted for booking_id: $id (No nullable columns)");
                }
            }
        } catch (\Throwable $th) {
            Log::error('An error occurred in updatebootNullColumnsCheck: ' . $th->getMessage());
        }

    }
    // for Check pins and verify its availablity

    // protected static function updatebootpincode($booking_id, $pincode)
    // {
    //     try {
    //         $id = $booking_id;
    //         $receiverPin = $pincode;

    //         try {
    //             $pinExists = Uploaded_pin::where('pincode', $receiverPin)->exists();

    //             Log::info("Booking ID: " . ($id ?: 'null') . ", Pincode: $receiverPin, Pin Exists: " . ($pinExists ? 'true' : 'false'));
    //             $existingAudit = forword_pincodeaudit_b2c::where('booking_id', $id)->first();
    //             if (!$existingAudit) {
    //                 forword_pincodeaudit_b2c::create([
    //                     'booking_id' => $id,
    //                     'pincode' => $receiverPin,
    //                     'status' => $pinExists ? true : false
    //                 ]);
    //             } else {
    //                 $existingAudit->update([
    //                     'booking_id' => $id,
    //                     'pincode' => $receiverPin,
    //                     'status' => $pinExists ? true : false
    //                 ]);
    //             }


    //         } catch (\Exception $e) {
    //             Log::error('An error occurred: ' . $e->getMessage());
    //         }

    //     } catch (\Throwable $th) {
    //         // Log the exception
    //         Log::error('An error occurred: ' . $th->getMessage());
    //     }

    // }

    protected static function disputestatus($booking_id)
    {
        $id = $booking_id;
        $check = forword_audit_b2c::where('booking_id', $id)->count();
        $check_and_update = forword_pincodeaudit_b2c::where(['booking_id' => $id, 'status' => '0'])->count();
        if ($check) {
            Log::error("Disputed");

            BookingB2c::where('id', $id)->update(['disputed_status' => 'false']);
        } else {
            BookingB2c::where('id', $id)->update(['disputed_status' => 'true']);
            // if (!$check_and_update)
            // {
            //     BookingB2c::where('id', $id)->update(['disputed_status' => 'true']);
            // }
        }
    }


    // Courier Allocation Calcualtions

    public function find_couriers_allocations($unassignedBookings)
    {
        $booking_length = [];

        $get_clients = BookingB2c::select('id', 'receiver_pincode', 'client_id')->whereIn('id', $unassignedBookings)->get();
        $get_courier = Courier::where('status', 'true')->count();

        $assigned_booking_ids = [];
        $results = [];

        try {
            foreach ($get_clients as $value) {
                $assigned = false; // Flag to track if booking has been assigned
                $client_id = $value->client_id;
                $pin_code = $value->receiver_pincode;

                $get_allocation = Courier_allocated::where('client_id', $client_id)
                    ->whereIn('priority', range(1, $get_courier - 1))
                    ->get();

                foreach ($get_allocation as $allocation) {
                    $courier_id = $allocation->courier_id;

                    $get_pin = Uploaded_pin::where('courier', $courier_id)
                        ->where('pincode', $pin_code)
                        ->first();

                    if ($get_pin) {
                        $assigned_booking_ids[] = $value->id;

                        $res = new CourierAssign_Request_b2c;
                        $res->booking_id = $value->id;
                        $res->courier_id = $courier_id;
                        $res->accept_status = "false";
                        $res->notification_id = "1";
                        $res->priority = $allocation->priority;

                        $res->save();

                        $update = BookingB2c::where('id', $value->id)->update(['status' => 'Assigned Request']);

                        $assigned = true;
                        break;
                    }
                }

                if (!$assigned) {
                    // If booking is not assigned, add to results array
                    $results = [
                        'id' => $value->id,
                        'message' => 'Booking not assigned',
                    ];
                }
            }

            if (empty($results)) {
                // If no bookings were unassigned, return success message
                $result = [
                    "status" => "success",
                    "message" => "All bookings are assigned"
                ];
            } else {
                // If some bookings were not assigned, return the results array
                $result = [
                    "status" => "failure",
                    "message" => "Some bookings were not assigned",
                    "unassigned_bookings" => $results
                ];
            }
        } catch (\Exception $e) {
            // Catch any exceptions that might occur during processing
            $result = [
                "status" => "error",
                "message" => "An error occurred: " . $e->getMessage()
            ];
        }

        return $result;

    }


    // wallet deductions and transections logs


    public static function processDispute($ids, $courier_id)
    {
        try {

            $checking_dispute = self::whereIn('id', $ids)->where('status','Manifestated')->with('warehouses')->get();
            $trueIds = [];
            $falseIds = [];
            $results = [];

            foreach ($checking_dispute as $item)
            {
                $order_id = $item->order_no;
                $id = $item->id;
                $status = $item->disputed_status;

                if ($status === 'true') {
                    $trueIds[] = $id;
                }
                else
                {
                    $falseIds[] = $id;
                    Log::error("false id: $id");
                }

                $warehouse_pincode = $item->warehouses->business_name ?? null;
                $receiver_pincode = $item->receiver_pincode;
                $booking_price = $item->item_price;
                $weight = $item->item_weight;
                $height = $item->item_height;
                $width = $item->item_Width;
                $length = $item->item_length;
                $cod_due = $item->cod_due;

                // getting courier rate
                $pickup = Pin_Code::where('pin_code', $receiver_pincode)
                    ->where('status', 'true')
                    ->first();

                $delivery = Pin_Code::where('pin_code', $receiver_pincode)
                    ->where('status', 'true')
                    ->first();

                $zonedata = Zone::where('origin', $pickup->city_name)
                    ->where('destination', $delivery->city_name)
                    ->where('status', 'true')
                    ->first();

                // Initialize the select statement
                $selectStatement = Courier_rate::select('service_id', 'courier_id', 'weight', 'fsc_percentage', 'gst_percentage', 'cod', 'cod_percentage', 'other_charges', 'cod_cycle', 'type', 'status')
                    ->where('status', 'true')
                    ->where('courier_id', $courier_id)
                    ->where('type', '<>', 'RTO')
                    ->with(['couriers', 'courier_service']);

                // Switch statement based on zone_type
                switch ($zonedata->zone_type) {
                    case 'A':
                        $selectStatement->addSelect('zone_a as zone_price');
                        break;
                    case 'B':
                        $selectStatement->addSelect('zone_b as zone_price');
                        break;
                    case 'C':
                        $selectStatement->addSelect('zone_c as zone_price');
                        break;
                    case 'D':
                        $selectStatement->addSelect('zone_d as zone_price');
                        break;
                    case 'E':
                        $selectStatement->addSelect('zone_e as zone_price');
                        break;
                    case 'F':
                        $selectStatement->addSelect('zone_f as zone_price');
                        break;
                    case 'G':
                        $selectStatement->addSelect('zone_g as zone_price');
                        break;
                    default:
                        // Handle the default case if needed
                        break;
                }

                $data = $selectStatement->get();

                foreach ($data as $items)
                {
                    if(!empty($trueIds))
                    {
                        $Service_ID = $items->service_id;
                        $Courier_ID = $items->courier_id;
                        $Weight = $items->weight;
                        $FSC_Percentage = $items->fsc_percentage;
                        $GST_Percentage = $items->gst_percentage;
                        $COD = $items->cod;
                        $COD_Percentage = $items->cod_percentage;
                        $Other_Charges = $items->other_charges;
                        $COD_Cycle = $items->cod_cycle;
                        $Type = $items->type;
                        $Status = $items->status;
                        $Zone_Price = $items->zone_price;

                        // Assuming you want to print related courier and courier service information
                        $Courier_Name = $items->couriers->courier_registration_name;
                        $Courier_Service = $items->courier_service->service;

                        $totalPercentage = $FSC_Percentage + $GST_Percentage;

                        $Percent_Price = ($Zone_Price / 100) * $totalPercentage;
                        $other_charges = $Percent_Price + $Zone_Price + $Other_Charges;
                        $lbh = $width + $height + $length / 5000 + $other_charges;

                        // Checking COD
                        if (!is_null($cod_due))
                        {
                            $get_cod_duepercent = ($cod_due / 100) * $COD_Percentage;
                            $deduction = ($COD > $get_cod_duepercent) ? $COD + $lbh : $get_cod_duepercent + $lbh;

                            $checking_threshhold = Client::where('id', $item->client_id)->first();
                            if ($checking_threshhold->wallet_balance > $get_cod_duepercent)
                            {

                                $get_sum = $checking_threshhold->wallet_balance - $deduction;
                                if ($get_sum >= 0)
                                {
                                    $res = new Wallet_log;
                                    $res->client_id = $item->client_id;
                                    $res->booking_id = $order_id;
                                    $res->amount = $deduction;
                                    $res->description = "Booking Deduction";
                                    $res->balance = $get_sum;
                                    $res->status = "debit";
                                    $res->save();
                                    Client::where('id', $item->client_id)->update(['wallet_balance' => $get_sum]);

                                    $message = '';

                                    $assignedBookings = CourierAssign_Request_b2c::whereIn('booking_id', $ids)->get();
                                    $assignedIds = $assignedBookings->pluck('booking_id')->toArray();
                                    $unassignedIds = array_diff($ids, $assignedIds);

                                    if (!empty($unassignedIds)) {
                                        $message .= "All Disputed are solved. True IDs: " . implode(', ', $trueIds) . "\n";

                                        $assignedBookings = CourierAssign_Request_b2c::whereIn('booking_id', $trueIds)
                                            ->get();

                                        $assignedIds = $assignedBookings->pluck('booking_id')->toArray();
                                        $unassignedIds = array_diff($trueIds, $assignedIds);

                                        if (!empty($unassignedIds)) {
                                            $alreadyAssignedToCourier = CourierAssign_Request_b2c::whereIn('booking_id', $unassignedIds)
                                                ->where('courier_id', $courier_id)
                                                ->get();

                                            if ($alreadyAssignedToCourier->count() === 0) {
                                                foreach ($unassignedIds as $value) {
                                                    $request_id = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                                                    $res = new CourierAssign_Request_b2c;

                                                    $res->request_id = $request_id;
                                                    $res->booking_id = $value;
                                                    $res->courier_id = $courier_id;
                                                    $res->accept_status = "false";
                                                    $res->notification_id = "1";
                                                    $res->save();
                                                }

                                                $update = BookingB2c::whereIn('id', $unassignedIds)->update(['status' => 'Assigned Request']);

                                                $results = ["status" => "success", "message" => "Assigning Request Sent"];
                                            } else {
                                                $results = ['status' => 'error', 'message' => 'Some bookings are already assigned to this courier'];
                                            }
                                        }
                                    } else {
                                        $results = ["status" => "error", "message" => "All specified bookings are already assigned to couriers"];
                                    }
                                } else {
                                    $results = ["status" => "error", "message" => "Insufficient balance for booking deduction"];
                                }





                            } else {
                                $results = [
                                    'status' => 'error',
                                    'message' => $checking_threshhold->first_name . $checking_threshhold->last_name . ' has low balance in wallet'
                                ];
                            }
                        }
                    }

                    if (!empty($falseIds))
                    {
                        $message .= "Please resolve issues first. False IDs: " . implode(', ', $falseIds);
                        Log::info("checking false ids" . $message);
                        $tags = forword_audit_b2c::whereIn('booking_id', $falseIds)->get(['booking_id', 'response']);

                        $selectedColumns = [
                            'id',
                            'order_no',
                            'business_type',
                            'awb_no',
                            'payment_mode',
                            'item_price',
                            'cod_due',
                            'receiver_name',
                            'receiver_address',
                            'receiver_address_2',
                            'receiver_state',
                            'receiver_city',
                            'receiver_pincode',
                            'receiver_contactno',
                            'receiver_alt_contactno',
                            'item_sku',
                            'item_name',
                            'item_height',
                            'item_length',
                            'item_weight',
                            'item_Width',
                            'item_qty',
                            'order_type',
                            'client_id',
                            'warehouse_id',
                        ];

                        $columnNames = Schema::getColumnListing((new BookingB2c())->getTable());
                        $selectedColumnNames = array_intersect($columnNames, $selectedColumns);
                        $data = BookingB2c::select(...$selectedColumnNames)
                            ->whereIn('id', $falseIds)
                            ->get();

                        $dataWithTags = $data->map(function ($item) use ($tags) {
                            $tag = $tags->firstWhere('booking_id', $item['id'] ?? null);
                            return [
                                'order_no' => $item['order_no'],
                                'Business Type' => $item['business_type'],
                                'AWB No' => $item['awb_no'],
                                'Payment Mode' => $item['payment_mode'],
                                'Item Price' => $item['item_price'],
                                'COD Due' => $item['cod_due'],
                                'Receiver Name' => $item['receiver_name'],
                                'Receiver Address' => $item['receiver_address'],
                                'Receiver Address 2' => $item['receiver_address_2'],
                                'Receiver State' => $item['receiver_state'],
                                'Receiver City' => $item['receiver_city'],
                                'Receiver Pincode' => $item['receiver_pincode'],
                                'Receiver Contact No' => $item['receiver_contactno'],
                                'Receiver Alt Contact No' => $item['receiver_alt_contactno'],
                                'Item SKU' => $item['item_sku'],
                                'Item Name' => $item['item_name'],
                                'Item Height' => $item['item_height'],
                                'Item Length' => $item['item_length'],
                                'Item Weight' => $item['item_weight'],
                                'Item Width' => $item['item_Width'],
                                'Item Qty' => $item['item_qty'],
                                'Order Type' => $item['order_type'],
                                'Client ID' => $item['client_id'],
                                'Warehouse ID' => $item['warehouse_id'],
                                'response' => $tag ? $tag->response : null
                            ];
                        });

                        $excelExport = new error_b2c($dataWithTags);
                        $filename = 'forword-booking-b2b.xlsx';

                        $results = ExcelFacade::download($excelExport, $filename);
                    }

                    // if (!empty($message))
                    // {
                    //     $results = ["status" => "success", "message" => $message];
                    // } else {
                    //     $results = ['status' => 'error', 'message' => 'No IDs found'];
                    // }
                }
            }

            // Returning all results
            return $results;
        } catch (\Exception $e) {
            Log::error('An error occurred while processing dispute: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'An error occurred while processing dispute'], 500);
        }
    }

}
