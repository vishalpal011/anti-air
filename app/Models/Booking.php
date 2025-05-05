<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Models\BookingAudit;
use Illuminate\Support\Facades\Log;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'business_type',
        'courier',
        'warehouse_id',
        'lr_no',
        'order_no',
        'transport_mode',
        'vendor_name',
        'cd_no',
        'edd',
        'receiver_name',
        'receiver_address',
        'receiver_address_2',
        'receiver_state',
        'receiver_city',
        'receiver_pincode',
        'receiver_contact_no',
        'receiver_alt_contact_no',
        'remarks',
        'invoice_no',
        'payment_mode',
        'item_price',
        'cod_due',
        'to_pay',
        'cash_received',
        'cft',
        'item_weight_kg',
        'item_height_cm',
        'ite m_length_cm',
        'item_width_cm',
        'receiver_gstin',
        'invoice_amount_rs',
        'e_way_bill',
        'fragile',
        'rov_type',
        'disputed_status',
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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model)
        {
            $model->bootNullColumnsCheck();
            $model->bootpincheck();
            $model->disputestatusforcreate();
        });

        static::updating(function ($model)
        {
            if ($model->isDirty('order_no'))
            {
                $model->updatebootNullColumnsCheck($model->getKey());
                $model->updatebootpincode($model->getKey());
                $model->disputestatus($model->getKey());
            }
        });

    }

    // checking excel
    protected static function bootNullColumnsCheck()
    {

        try
        {
            if (Schema::hasTable((new self)->getTable()))
            {

                $columns = Schema::getColumnListing((new self)->getTable());
                $customColumns = [
                    'client_id',
                    'warehouse_id',
                    'order_no',
                    'transport_mode',
                    'receiver_state',
                    'receiver_name',
                    'receiver_address',
                    'receiver_address_2',
                    'receiver_city',
                    'receiver_pincode',
                    'receiver_contact_no',
                    'receiver_alt_contact_no',
                    'invoice_no',
                    'payment_mode',
                    'item_price',
                    'cod_due',
                    'to_pay',
                    'item_weight_kg',
                    'item_height_cm',
                    'item_length_cm',
                    'item_width_cm',
                    'invoice_amount_rs',
                ];

                $excludedColumns = ['status', 'deleted_at'];

                $uniqueColumns = array_merge(['id'], $customColumns);

                $nullableColumnsById = [];
                $records = static::select(array_merge(['id'], $uniqueColumns))->get();

                foreach ($records as $record)
                {
                    $id = $record->id;
                    $nullableColumns = array_filter($uniqueColumns, function ($column) use ($record, $excludedColumns) {
                        return !in_array($column, $excludedColumns) && is_null($record->$column);
                    });

                    if (!empty($nullableColumns)) {
                        if (!isset($nullableColumnsById[$id])) {
                            $nullableColumnsById[$id] = [];
                        }
                        $nullableColumnsById[$id] = array_merge($nullableColumnsById[$id], array_values($nullableColumns));
                    }
                }

                foreach ($nullableColumnsById as $id => $nullableColumns)
                {
                    $pincodeServiceable = true;
                    $existingAudit = BookingAudit::where('booking_id', $id)->first();
                    if (!$existingAudit) {
                        BookingAudit::create([
                            'booking_id' => $id,
                            'response' => json_encode($nullableColumns),
                            'pindcode' => $pincodeServiceable ? 'true' : 'false',
                        ]);
                    }

                }
            }
        } catch (\Throwable $th) {
            // Log the exception
            Log::error('An error occurred: ' . $th->getMessage());
            // You may choose to throw the exception again or handle it as needed
            // throw $th;
        }

    }

    // for Check pins and verify its availablity

    protected static function bootpincheck()
    {
        try {
            if (Schema::hasTable((new self)->getTable()))
            {
                $uniqueColumns = ['id', 'receiver_pincode'];

                $nullableColumnsById = [];
                $records = static::select($uniqueColumns)->get();

                foreach ($records as $record)
                {
                    $id = $record->id;
                    $receiverPin = $record->receiver_pincode;
                    // $priority =


                    try {
                        $pinExists = Uploaded_pin::where('pincode', $receiverPin)->exists();
                        Log::info("Booking ID: " . ($id ?: 'null') . ", Pincode: $receiverPin, Pin Exists: " . ($pinExists ? 'true' : 'false'));

                        if (!is_null($id))
                        {
                            $existingAudit = PincodeAudit::where('booking_id', $id)->first();
                            if (!$existingAudit)
                            {
                                $dispute_booking = BookingB2c::where('id', $id)->update(['disputed_status' => 'false']);

                                PincodeAudit::create([
                                    'booking_id' => $id,
                                    'pincode' => $receiverPin,
                                    'status' => $pinExists
                                ]);
                            }
                        } else {
                            Log::error('Invalid booking ID: ' . json_encode($record));
                        }
                    } catch (\Exception $e) {
                        Log::error('An error occurred: ' . $e->getMessage());
                    }
                }
            }
        } catch (\Throwable $th) {
            // Log the exception
            Log::error('An error occurred: ' . $th->getMessage());
        }

    }
    protected static function disputestatusforcreate()
    {
        if (Schema::hasTable((new self)->getTable()))
        {
            $columns = Schema::getColumnListing((new self)->getTable());
            $customColumns = [
                'client_id',
                'warehouse_id',
                'order_no',
                'transport_mode',
                'receiver_state',
                'receiver_name',
                'receiver_address',
                'receiver_address_2',
                'receiver_city',
                'receiver_pincode',
                'receiver_contact_no',
                'receiver_alt_contact_no',
                'invoice_no',
                'payment_mode',
                'item_price',
                'cod_due',
                'to_pay',
                'item_weight_kg',
                'item_height_cm',
                'item_length_cm',
                'item_width_cm',
                'invoice_amount_rs',
            ];

            $excludedColumns = ['status', 'deleted_at'];

            $uniqueColumns = array_merge(['id'], $customColumns);

            $nullableColumnsById = [];
            $records = static::select(array_merge(['id'], $uniqueColumns))->get();
            foreach ($records as $record)
            {
                $id = $record->id;
                $check = BookingAudit::where('booking_id',$id)->count();
                if ($check)
                {
                    Booking::where('id', $id)->update(['disputed_status' => 'false']);

                   $check_and_update = PincodeAudit::where(['booking_id' => $id, 'status' => '0'])->count();

                    if ($check_and_update)
                    {
                        $dispute_booking = Booking::where('id', $id)->update(['disputed_status' => 'false']);
                    }
                    else
                    {
                        $dispute_booking = Booking::where('id', $id)->update(['disputed_status' => 'true']);
                    }
                }
                else
                {
                    Booking::where('id', $id)->update(['disputed_status' => 'true']);
                    $check_and_update = PincodeAudit::where(['booking_id' => $id, 'status' => '0'])->count();

                    if ($check_and_update)
                    {
                        $dispute_booking = Booking::where('id', $id)->update(['disputed_status' => 'false']);
                    }
                    else
                    {
                        $dispute_booking = Booking::where('id', $id)->update(['disputed_status' => 'true']);
                    }
                }

            }
        }
    }

    // updateing process

    protected static function updatebootNullColumnsCheck($booking_id)
    {
        try
        {

            $columns = Schema::getColumnListing((new self)->getTable());
                $customColumns = [
                    'client_id',
                    'warehouse_id',
                    'order_no',
                    'transport_mode',
                    'receiver_state',
                    'receiver_name',
                    'receiver_address',
                    'receiver_address_2',
                    'receiver_city',
                    'receiver_pincode',
                    'receiver_contact_no',
                    'receiver_alt_contact_no',
                    'invoice_no',
                    'payment_mode',
                    'item_price',
                    'cod_due',
                    'to_pay',
                    'item_weight_kg',
                    'item_height_cm',
                    'item_length_cm',
                    'item_width_cm',
                    'invoice_amount_rs',
                ];

                $excludedColumns = ['status', 'deleted_at'];

                $uniqueColumns = array_merge(['id'], $customColumns);

                $nullableColumnsById = [];

            $records = static::select(['id'] + $uniqueColumns)->where('id', $booking_id)->get();

            foreach ($records as $record)
            {

                $id = $record->id;

                $nullableColumns = array_filter($uniqueColumns, function ($column) use ($record, $excludedColumns) {
                    return !in_array($column, $excludedColumns) && is_null($record->$column);
                });

                if (!empty($nullableColumns))
                {
                    if (!isset($nullableColumnsById[$id]))
                    {
                        $nullableColumnsById[$id] = [];
                    }
                    $nullableColumnsById[$id] = array_merge($nullableColumnsById[$id], array_values($nullableColumns));
                    foreach ($nullableColumnsById as $id => $nullableColumns)
                    {
                        $pincodeServiceable = true;
                         if (empty($nullableColumns))
                        {

                        }
                        else
                        {

                             $existingAudit = BookingAudit::where('booking_id', $id)->first();
                            if (!$existingAudit)
                            {
                                  BookingAudit::create([
                                    'booking_id' => $id,
                                    'response' => json_encode($nullableColumns),
                                    'pindcode' => $pincodeServiceable ? 'true' : 'false',
                                ]);
                            } else
                            {
                                 if(empty(json_encode($nullableColumns)))
                                {
                                  BookingAudit::where('booking_id', $id)->delete();
                                }
                                else
                                {
                                    $existingAudit->update([
                                        'response' => json_encode($nullableColumns),
                                        'pindcode' => $pincodeServiceable ? 'true' : 'false',
                                    ]);

                                }

                            }
                        }
                    }


                }
                else
                {
                    BookingAudit::where('booking_id', $id)->delete();

                    // Log::error('Remaining Columns: ' . json_encode($nullableColumns));

                }
            }


        } catch (\Throwable $th)
        {
            // Log the exception with a more meaningful message
            Log::error('An error occurred in updatebootNullColumnsCheck: ' . $th->getMessage());
            // Handle the exception based on your application's requirements
        }
    }
    // for Check pins and verify its availablity

    protected static function updatebootpincode($booking_id,$pincode)
    {
        try
        {
             $id = $booking_id;
             $receiverPin = $pincode;

                    try
                    {
                        $pinExists = Uploaded_pin::where('pincode', $receiverPin)->exists();

                        // Log::info("Booking ID: " . ($id ?: 'null') . ", Pincode: $receiverPin, Pin Exists: " . ($pinExists ? 'true' : 'false'));
                        $existingAudit = PincodeAudit::where('booking_id', $id)->first();
                        if (!$existingAudit)
                        {
                            PincodeAudit::create([
                                'booking_id' => $id,
                                'pincode' => $receiverPin,
                                'status' => $pinExists
                            ]);
                        }
                        else
                        {
                            $existingAudit->update([
                                'booking_id' => $id,
                                'pincode' => $receiverPin,
                                'status' => $pinExists
                            ]);
                        }


                    } catch (\Exception $e) {
                        Log::error('An error occurred: ' . $e->getMessage());
                    }

        } catch (\Throwable $th) {
            // Log the exception
            Log::error('An error occurred: ' . $th->getMessage());
        }

    }

    protected static function disputestatus($booking_id,$pincode)
    {
        $id = $booking_id;
        $receiverPin = $pincode;

         $bookingAuditCount = BookingAudit::where('booking_id', $id)->count();
         $pincodeAuditCount = PincodeAudit::where(['booking_id' => $id, 'status' => '0'])->count();

         if ($bookingAuditCount)
         {
             Booking::where('id', $id)->update(['disputed_status' => 'false']);

            //  if (!$pincodeAuditCount)
            //  {
            //     Booking::where('id', $id)->update(['disputed_status' => 'true']);
            //  }
        }
        else
        {
             Booking::where('id', $id)->update(['disputed_status' => 'true']);

             if ($pincodeAuditCount) {
                Booking::where('id', $id)->update(['disputed_status' => 'false']);
            } else {
                 Booking::where('id', $id)->update(['disputed_status' => 'true']);
            }
        }

    }


}
