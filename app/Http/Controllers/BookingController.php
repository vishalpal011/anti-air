<?php

namespace App\Http\Controllers;

use App\Exports\Booking\error_b2c;
use App\Imports\ExportupdatedBulkBooking;
use App\Models\Booking;
use App\Models\BookingAudit;
use App\Models\BookingB2c;
use App\Models\Client;
use App\Models\Courier;
use App\Models\Courier_rate;
use App\Models\CourierAssign_Request;
use App\Models\CourierAssign_Request_b2c;
use App\Models\CourierAssign_reverse_request;
use App\Models\forword_audit_b2c;
use App\Models\Label_setting;
use App\Models\Pin_Code;
use App\Models\PincodeAudit;
use App\Models\Reverse_booking;
use App\Models\Selected_label;
use App\Models\Wallet_log;
use App\Models\warehouse;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Imports\ExportBulkBooking; // Check this import statement
use App\Imports\ExportBulkBookingb2c; // Check this import statement
use App\Imports\Reverse\ExportReverseBooking;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use App\Exports\Booking\b2b_forword;
use App\Exports\Booking\b2b_reverse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Log;
use App\Models\Lable_design;
use Dompdf\Dompdf;
use ZipArchive;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use App\Mail\Scheduled_pickup;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    // Manual Bookings of B2B
    public function manual_booking(Request $request)
    {
        try {
            $model = new Booking;
            $model->client_id = $request->client_id;
            $model->business_type = $request->business_type;
            $model->warehouse_id = $request->warehouse_id;
            $model->lr_no = $request->lr_no;
            $model->order_no = $request->order_no;
            $model->transport_mode = $request->transport_mode;
            $model->vendor_name = $request->vendor_name;
            $model->cd_no = $request->cd_no;
            $model->edd = $request->edd;
            $model->receiver_name = $request->receiver_name;
            $model->receiver_address = $request->receiver_address;
            $model->receiver_address_2 = $request->receiver_address_2;
            $model->receiver_state = $request->receiver_state;
            $model->receiver_city = $request->receiver_city;
            $model->receiver_pincode = $request->receiver_pincode;
            $model->receiver_contact_no = $request->receiver_contact_no;
            $model->receiver_alt_contact_no = $request->receiver_alt_contact_no;
            $model->remarks = $request->remarks;
            $model->invoice_no = $request->invoice_no;
            $model->payment_mode = $request->payment_mode;
            $model->item_price = $request->item_price;
            $model->cod_due = $request->cod_due;
            $model->to_pay = $request->to_pay;
            $model->cash_received = $request->cash_received;
            $model->cft = $request->cft;
            $model->item_weight_kg = $request->item_weight_kg;
            $model->item_height_cm = $request->item_height_cm;
            $model->item_length_cm = $request->item_length_cm;
            $model->item_width_cm = $request->item_width_cm;
            $model->receiver_gstin = $request->receiver_gstin;
            $model->invoice_no = $request->invoice_no;
            $model->invoice_amount_rs = $request->invoice_amount_rs;
            $model->e_way_bill = $request->e_way_bill;
            $model->fragile = $request->fragile;
            $model->rov_type = $request->rov_type;
            $model->status = "Manifestated";
            $model->channel_name = "Manuall";

            $model->save();
            // Booking::bootNullColumnsCheck();
            // Booking::disputestatusforcreate();
            // Booking::bootpincheck();
            if ($model) {
                return response()->json(["status" => "success", "message" => "Booking Created"]);
            } else {
                return response()->json(['status' => 'false', 'message' => 'Something went Wrong']);
            }
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
    // Manual Bookings of B2B end

    public function all_booking(Request $request)
    {
        try {
            // $bookings = Booking::with('warehouses')->get();
            // if ($perPage == 'all')
            // {
            //     $bookings = Booking::with('clients', 'couriers', 'warehouses')->get();
            // } else {
            //     $bookings = Booking::with('clients', 'couriers', 'warehouses')->paginate($perPage);
            // }

            $perPage = $request->input('perPage', 10);
            $bookings = Booking::with('clients', 'couriers', 'warehouses')->paginate($perPage);
            $booking_ids = $bookings->pluck('id')->toArray();

            $bookingaudit = BookingAudit::whereIn('booking_id', $booking_ids)->get();
            $pincode_audits = PincodeAudit::whereIn('booking_id', $booking_ids)->get();
            $bookingauditByBookingId = $bookingaudit->groupBy('booking_id');

            $couriers = Courier::where('status', 'true')->get();
            $all_booking = Booking::count();
            $faild_orders = Booking::where('disputed_status', 'false')->count();
            $canceled_orders = Booking::where('disputed_status', 'true')->count();
            $ready_topickup = Booking::where('status', 'Assigned Request')->paginate($perPage);
            //  dd($ready_topickup);
            return view('all-booking', compact('bookings', 'couriers', 'bookingauditByBookingId', 'pincode_audits', 'perPage', 'all_booking', 'faild_orders', 'canceled_orders', 'ready_topickup'));

        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function get_client(Request $request)
    {
        $id = $request->id;
        $get = Client::select('first_name', 'last_name', 'company_name', 'email', 'average_monthly_orders', 'billing_pin_code', 'billing_cycle')->where('id', $id)->first();

        return $get;
        // return response()->json(['first_name' => $get->first_name, 'last_name' =>  $get->last_name]);
    }

    public function get_warehouse(Request $request)
    {
        $client_id = $request->client_id;

        $data = warehouse::where('client_id', $client_id)->get();

        if (count($data) > 0) {
            foreach ($data as $value) {
                echo '<option value=' . $value->id . '>' . $value->warehouse_name . '</option>';
            }
        } else {
            echo "No warehouse Found";
            // return response()->json(['status' => 'true', 'message' => 'No Data Found']);
        }


    }

    // Bulk Booking and Assigning

    public function upload_bulkbooking(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            $data = [];

            if ($request->business_type == "B2B") {
                $data['business_type'] = $request->business_type;
                $import = new ExportBulkBooking($data);

                $file = $request->file('file');
                ExcelFacade::import($import, $file);


                return response()->json(["status" => "success", "message" => "Excel file uploaded."]);
            }

            if ($request->business_type == "B2C") {
                $data['business_type'] = $request->business_type;
                $import = new ExportBulkBookingb2c($data);

                $file = $request->file('file');
                ExcelFacade::import($import, $file);


                return response()->json(["status" => "success", "message" => "Excel file uploaded."]);
            }






        } catch (\Exception $e) {

            return response()->json(["status" => "false", "message" => $e->getMessage()]);
        }
    }

    public function assign_couriers(Request $request)
    {
        $ids = $request->ids;
        $modalFormData = $request->modalFormData;

        try {
            $checking_dispute = Booking::whereIn('id', $ids)->get(['id', 'disputed_status']);

            $trueIds = [];
            $falseIds = [];

            foreach ($checking_dispute as $item) {
                $id = $item->id;
                $status = $item->disputed_status;

                if ($status === 'true') {
                    $trueIds[] = $id;
                } else {
                    $falseIds[] = $id;
                }
            }

            $message = "";

            if (!empty($trueIds)) {
                $message .= "All Disputed are solved. True IDs: " . implode(', ', $trueIds) . "\n";

                $assignedBookings = CourierAssign_Request::whereIn('booking_id', $trueIds)
                    ->get();

                $assignedIds = $assignedBookings->pluck('booking_id')->toArray();
                $unassignedIds = array_diff($trueIds, $assignedIds);

                if (!empty($unassignedIds)) {

                    $alreadyAssignedToCourier = CourierAssign_Request::whereIn('booking_id', $unassignedIds)
                        ->where('courier_id', $modalFormData)
                        ->get();

                    if ($alreadyAssignedToCourier->count() === 0) {
                        foreach ($unassignedIds as $value) {
                            $request_id = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

                            $res = new CourierAssign_Request;

                            $res->request_id = $request_id;
                            $res->booking_id = $value;
                            $res->courier_id = $modalFormData;
                            $res->accept_status = "false";
                            $res->notification_id = "1";
                            $res->save();
                        }

                        $update = Booking::whereIn('id', $unassignedIds)->update(['status' => 'Assigned Request']);

                        // return response()->json(["status" => "success", "message" => "Assigning Request Sent"], 200);
                    } else {
                        return response()->json(['status' => 'error', 'message' => 'Some bookings are already assigned to this courier'], 400);
                    }
                } else {
                    return response()->json(['status' => 'error', 'message' => 'All specified bookings are already assigned to couriers'], 400);
                }
            }

            if (!empty($falseIds)) {
                $message .= "Please Resolve issues first. False IDs: " . implode(', ', $falseIds);
            }

            if (!empty($message)) {

                return response()->json(["status" => "success", "message" => $message], 200);

            } else {
                return response()->json(["status" => "error", "message" => "No IDs found"], 400);
            }

        } catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => 'Internal Server Error' . $e->getMessage()], 400);
        }
    }


    // end Bulk Booking and Assigning

    // View Single Booking

    public function view_bookings(Request $request, $id)
    {
        $model = Booking::with('clients')->find($id);

        $client = $model->client_id;
        $warehouse = $model->warehouse_id;
        $warehouse = warehouse::where('id', $warehouse)->first();



        $bookingaudit = BookingAudit::where('booking_id', $id)->get();
        $pincode_audits = PincodeAudit::where('booking_id', $id)->get();
        $bookingauditByBookingId = $bookingaudit->groupBy('booking_id');
        try {
            if ($model) {
                // dd($warehouse);
                return view('view-booking', compact('model', 'bookingauditByBookingId', 'pincode_audits', 'warehouse'));
            } else {
                return response()->json(["status" => "error", "message" => "Something Went wrong."]);
            }
        } catch (\Throwable $th) {
            return response()->json(["status" => "error", "message" => $th->getMessage()]);

        }
    }


    // update booking

    public function rebooking(Request $request, $id)
    {
        $booking = Booking::with('clients')->find($id);
        $client_id = $booking->client_id;
        $client = Client::where('id', $client_id)->first();
        $warehouse = warehouse::where('client_id', $client_id)->get();
        // dd($warehouse);
        return view('rebooking', compact('booking', 'client', 'warehouse'));
    }

    public function update_manual_booking(Request $request)
    {
        try {

            $booking_id = $request->booking_id;
            $pincode = $request->receiver_pincode;
            $model = Booking::where('id', $booking_id)->first();

            if ($model) {
                $model->client_id = $request->client_id;
                $model->business_type = $request->business_type;
                $model->warehouse_id = $request->warehouse_id;
                $model->lr_no = $request->lr_no;
                $model->order_no = $request->order_no;
                $model->transport_mode = $request->transport_mode;
                $model->vendor_name = $request->vendor_name;
                $model->cd_no = $request->cd_no;
                $model->edd = $request->edd;
                $model->receiver_name = $request->receiver_name;
                $model->receiver_address = $request->receiver_address;
                $model->receiver_address_2 = $request->receiver_address_2;
                $model->receiver_state = $request->receiver_state;
                $model->receiver_city = $request->receiver_city;
                $model->receiver_pincode = $request->receiver_pincode;
                $model->receiver_contact_no = $request->receiver_contact_no;
                $model->receiver_alt_contact_no = $request->receiver_alt_contact_no;
                $model->remarks = $request->remarks;
                $model->invoice_no = $request->invoice_no;
                $model->payment_mode = $request->payment_mode;
                $model->item_price = $request->item_price;
                $model->cod_due = $request->cod_due;
                $model->to_pay = $request->to_pay;
                $model->cash_received = $request->cash_received;
                $model->cft = $request->cft;
                $model->item_weight_kg = $request->item_weight_kg;
                $model->item_height_cm = $request->item_height_cm;
                $model->item_length_cm = $request->item_length_cm;
                $model->item_width_cm = $request->item_width_cm;
                $model->receiver_gstin = $request->receiver_gstin;
                $model->invoice_no = $request->invoice_no;
                $model->invoice_amount_rs = $request->invoice_amount_rs;
                $model->e_way_bill = $request->e_way_bill;
                $model->fragile = $request->fragile;
                $model->rov_type = $request->rov_type;
                $model->save();

                Booking::updatebootNullColumnsCheck($booking_id);
                Booking::updatebootpincode($booking_id, $pincode);
                Booking::disputestatus($booking_id, $pincode);

                return Response::json(["status" => "success", "message" => "Booking Updated"]);
            }
            return Response::json(["status" => "error", "message" => "Booking Not Found"]);

        } catch (\Exception $e) {
            // Handle the exception
            return Response::json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    // -----------------------------------------------B2C-----------------------------------------------------------------


    public function all_b2c_bookings(Request $request)
    {
        try {
            $bookings = BookingB2c::with('clients', 'couriers', 'warehouses')->latest()->paginate(10);

            $couriers = Courier::where('status', 'true')->get();

            // if ($bookings->isEmpty()) {
            //     return Response::json(['message' => 'No bookings found'], 404);
            // }
            //  dd($bookings);
            return view('all-b2c-bookings', compact('bookings', 'couriers'));
        } catch (\Exception $e) {
            \Log::error($e);
        }

    }


    public function assign_couriers_b2c(Request $request)
    {
        $ids = $request->ids;
        $courier_id = $request->modalFormData;

        try {

            $response = BookingB2c::processDispute($ids, $courier_id);
            // Log::info('Dispute processing response: ' . json_encode($response));
            return $response;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error' . $e->getMessage()], 400);
        }

    }

    public function delete_forword_booking(Request $request)
    {
        $ids = $request->ids;

        Booking::whereIn('id', $ids)->delete();
        return response()->json(["status" => "success", "message" => "Booking Deleted"], 200);
    }


    // All Reverse Booking

    public function reverse_booking(Request $request)
    {
        try {
            $bookings = Reverse_booking::with('clients', 'couriers', 'warehouses')->latest()->paginate(10);

            $couriers = Courier::where('status', 'true')->get();
            $client = Client::where('status', 'true')->get();


            return view('reverse-booking', compact('bookings', 'couriers', 'client'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function reverse_booking_create(Request $request)
    {
        try {
            $model = new Booking;



            $model->client_id = $request->client_id;
            $model->business_type = $request->business_type;
            $model->warehouse_id = $request->warehouse_id;
            $model->lr_no = $request->lr_no;
            $model->order_no = $request->order_no;
            $model->transport_mode = $request->transport_mode;
            $model->vendor_name = $request->vendor_name;
            $model->cd_no = $request->cd_no;
            $model->edd = $request->edd;
            $model->receiver_name = $request->receiver_name;
            $model->receiver_address = $request->receiver_address;
            $model->receiver_address_2 = $request->receiver_address_2;
            $model->receiver_state = $request->receiver_state;
            $model->receiver_city = $request->receiver_city;
            $model->receiver_pincode = $request->receiver_pincode;
            $model->receiver_contact_no = $request->receiver_contact_no;
            $model->receiver_alt_contact_no = $request->receiver_alt_contact_no;
            $model->remarks = $request->remarks;
            $model->invoice_no = $request->invoice_no;
            $model->payment_mode = $request->payment_mode;
            $model->item_price = $request->item_price;
            $model->cod_due = $request->cod_due;
            $model->to_pay = $request->to_pay;
            $model->cash_received = $request->cash_received;
            $model->cft = $request->cft;
            $model->item_weight_kg = $request->item_weight_kg;
            $model->item_height_cm = $request->item_height_cm;
            $model->item_length_cm = $request->item_length_cm;
            $model->item_width_cm = $request->item_width_cm;
            $model->receiver_gstin = $request->receiver_gstin;
            $model->invoice_no = $request->invoice_no;
            $model->invoice_amount_rs = $request->invoice_amount_rs;
            $model->e_way_bill = $request->e_way_bill;
            $model->fragile = $request->fragile;
            $model->rov_type = $request->rov_type;
            $model->booking_type = "reverse";
            $model->save();

            if ($model) {
                return response()->json(["status" => "success", "message" => "Booking Created"]);
            } else {
                return response()->json(['status' => 'false', 'message' => 'Something went Wrong']);
            }
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    public function upload_bulkbooking_reverse(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            $data = [];

            if ($request->business_type == "B2B") {
                $data['business_type'] = $request->business_type;
                $import = new ExportReverseBooking($data);

                $file = $request->file('file');
                ExcelFacade::import($import, $file);


                return response()->json(["status" => "success", "message" => "Excel file uploaded."]);
            }

            if ($request->business_type == "B2C") {
                $data['business_type'] = $request->business_type;
                $import = new ExportReverseBooking($data);

                $file = $request->file('file');
                ExcelFacade::import($import, $file);


                return response()->json(["status" => "success", "message" => "Excel file uploaded."]);
            }






        } catch (\Exception $e) {

            return response()->json(["status" => "false", "message" => $e->getMessage()]);
        }
    }

    public function all_reverse_booking(Request $request)
    {
        try {
            $bookings = Reverse_booking::with('clients', 'couriers', 'warehouses')->latest()->paginate(10);

            $couriers = Courier::where('status', 'true')->get();

            // if ($bookings->isEmpty())
            // {
            //     return Response::json(['message' => 'No bookings found'], 404);
            // }

            return view('all-reverse-booking', compact('bookings', 'couriers'));
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function assign_couriers_reverse_request(Request $request)
    {
        $ids = $request->ids;
        $modalFormData = $request->modalFormData;

        try {
            // Find already assigned bookings for any courier
            $assignedBookings = CourierAssign_reverse_request::whereIn('booking_id', $ids)
                ->get();

            $assignedIds = $assignedBookings->pluck('booking_id')->toArray();

            // Identify unassigned bookings
            $unassignedIds = array_diff($ids, $assignedIds);

            if (!empty($unassignedIds)) {
                // Some bookings are not assigned to any courier
                // Check if any of them are already assigned to the current courier
                $alreadyAssignedToCourier = CourierAssign_reverse_request::whereIn('booking_id', $unassignedIds)
                    ->where('courier_id', $modalFormData)
                    ->get();

                if ($alreadyAssignedToCourier->count() === 0) {
                    // Assign the unassigned bookings to the current courier
                    foreach ($unassignedIds as $value) {
                        $request_id = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

                        $res = new CourierAssign_reverse_request;

                        $res->request_id = $request_id;
                        $res->booking_id = $value;
                        $res->courier_id = $modalFormData;
                        $res->accept_status = "false";
                        $res->notification_id = "1";
                        $res->save();
                    }

                    // Update Booking Status for the unassigned bookings
                    $update = Reverse_booking::whereIn('id', $unassignedIds)->update(['status' => 'Assigned Request']);

                    return response()->json(["status" => "success", "message" => "Assigning Request Sent"], 200);
                } else {
                    // Some bookings are already assigned to the current courier
                    return response()->json(['status' => 'error', 'message' => 'Some bookings are already assigned to this courier'], 400);
                }
            } else {
                // All bookings are already assigned to some courier
                return response()->json(['status' => 'error', 'message' => 'All specified bookings are already assigned to couriers'], 400);
            }



        } catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => 'Internal Server Error' . $e->getMessage()], 400);
        }


    }


    public function delete_reverse_booking(Request $request)
    {
        $ids = $request->ids;

        Reverse_booking::whereIn('id', $ids)->delete();
        return response()->json(["status" => "success", "message" => "Booking Deleted"], 200);
    }

    // All Data download in Excel for Forwords



    public function all_forword_booking(Request $request)
    {
        $selectedColumns = ['client_id', 'business_type', 'warehouse_id'];
        $columnNames = Schema::getColumnListing((new Booking())->getTable());
        $selectedColumnNames = array_intersect($columnNames, $selectedColumns);
        $data = Booking::select(...$selectedColumnNames)->get();
        $data->prepend($selectedColumnNames);
        return ExcelFacade::download(new b2b_forword($data), 'forword-booking-b2b.xlsx');
    }

    public function reverse_booking_excel(Request $request)
    {
        $selectedColumns = ['client_id', 'business_type', 'warehouse_id', 'transport_mode'];
        $columnNames = Schema::getColumnListing((new Reverse_booking())->getTable());
        $selectedColumnNames = array_intersect($columnNames, $selectedColumns);
        $data = Reverse_booking::select(...$selectedColumnNames)->get();
        $data->prepend($selectedColumnNames);
        return ExcelFacade::download(new b2b_reverse($data), 'forword-booking-b2b.xlsx');
    }

    public function forword_Booking_B2C(Request $request)
    {
        try {
            $perPage = $request->input('perPage', 10);
            $bookings = BookingB2c::with('clients', 'couriers', 'warehouses')->paginate($perPage);
            $booking_ids = $bookings->pluck('id')->toArray();

            $bookingaudit = forword_audit_b2c::whereIn('booking_id', $booking_ids)->get();
            $pincode_audits = PincodeAudit::whereIn('booking_id', $booking_ids)->get();
            $bookingauditByBookingId = $bookingaudit->groupBy('booking_id');

            $couriers = Courier::where('status', 'true')->get();
            // orders status and bookings

            $all_booking = BookingB2c::count();
            $faild_orders = BookingB2c::where('disputed_status', 'false')->count();
            $booked = BookingB2c::where('disputed_status', 'true')->count();
            // sending data
            $pickup = BookingB2c::with('clients')->where('status', 'Assigned Request')->orwhere('status', 'waiting for pickup')->get();
            $clients = Client::all();
            return view('forword-booking-b2C', compact('bookings', 'clients', 'couriers', 'bookingauditByBookingId', 'pincode_audits', 'perPage', 'all_booking', 'faild_orders', 'booked', 'pickup'));
        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function view_bookings_b2c(Request $request, $id)
    {
        $booking = BookingB2c::with('clients')->find($id);
        $client_id = $booking->client_id;
        $client = Client::where('id', $client_id)->first();
        $warehouse = warehouse::where('client_id', $client_id)->get();
        // dd($warehouse);
        return view('rebooking-b2c', compact('booking', 'client', 'warehouse'));
    }

    public function update_bookings_b2c(Request $request)
    {
        try {
            $booking_id = $request->booking_id;
            $pincode = $request->receiver_pincode_;

            $model = BookingB2c::find($booking_id);

            if (!$model) {
                return response()->json(["status" => "error", "message" => "Booking not found"]);
            }

            // Update model properties
            $model->fill([
                'order_no' => $request->OrderNo,
                'business_type' => $request->business_type,
                'awb_no' => $request->awb_no,
                'payment_mode' => $request->PaymentMode,
                'item_price' => $request->ItemPrice,
                'cod_due' => $request->CODDue,
                'receiver_name' => $request->receiver_name_,
                'receiver_address' => $request->receiver_address,
                'receiver_address_2' => $request->receiver_address_2,
                'receiver_state' => $request->receiver_state,
                'receiver_city' => $request->receiver_city_,
                'receiver_pincode' => $request->receiver_pincode_,
                'receiver_contactno' => $request->receiver_contact,
                'receiver_alt_contactno' => $request->ReceiverAltContactNo,
                'item_sku' => $request->ItemSKU,
                'item_name' => $request->ItemName,
                'item_height' => $request->ItemHeight,
                'item_length' => $request->ItemLength,
                'item_weight' => $request->ItemWeight,
                'item_Width' => $request->ItemWidth,
                'item_qty' => $request->ItemQty,
                'order_type' => $request->OrderType,
                'client_id' => $request->client_id,
                'warehouse_id' => $request->warehouse_id,
                'status' => "Manifestated",
            ]);


            $model->save();

            // Call related methods
            BookingB2c::updatebootNullColumnsCheck($booking_id);
            // BookingB2c::updatebootpincode($booking_id, $pincode);
            BookingB2c::disputestatus($booking_id);

            // return response()->json(["status" => "success", "message" => "Booking updated successfully"]);
            return redirect('forword-Booking-B2C');

        } catch (\Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }

    }

    public function create_booking_b2c_manual(Request $request)
    {
        $model = new BookingB2c;
        $model->order_no = $request->OrderNo;
        $model->business_type = $request->business_type;
        $model->awb_no = $request->awb_no;
        $model->payment_mode = $request->PaymentMode;
        $model->item_price = $request->ItemPrice;
        $model->cod_due = $request->CODDue;
        $model->receiver_name = $request->receiver_name_;
        $model->receiver_address = $request->receiver_address;
        $model->receiver_address_2 = $request->receiver_address_2;
        $model->receiver_state = $request->receiver_state;
        $model->receiver_city = $request->receiver_city_;
        $model->receiver_pincode = $request->receiver_pincode_;
        $model->receiver_contactno = $request->receiver_contact;
        $model->receiver_alt_contactno = $request->ReceiverAltContactNo;
        $model->item_sku = $request->ItemSKU;
        $model->item_name = $request->ItemName;
        $model->item_height = $request->ItemHeight;
        $model->item_length = $request->ItemLength;
        $model->item_weight = $request->ItemWeight;
        $model->item_Width = $request->ItemWidth;
        $model->item_qty = $request->ItemQty;
        $model->order_type = $request->OrderType;
        $model->client_id = $request->client_id;
        $model->warehouse_id = $request->warehouse_id;
        $model->status = "Manifestated";
        $model->save();

        $response = [
            'status' => 'Success',
            'message' => 'Booking updated successfully'
        ];

        // Return JSON response
        return response()->json($response);

    }

    public function update_bookings_excel(Request $request)
    {
        $request->validate([
            'updated_excel' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('updated_excel');
        try {
            ExcelFacade::import(new ExportupdatedBulkBooking, $file);
            return response()->json(["status" => "success", "message" => "Excel file uploaded and data imported."]);
        } catch (\Exception $e) {
            return response()->json(["status" => "error", "message" => "Error occurred while importing Excel file."]);
        }
    }
    public function find_couriers_allocations(Request $request)
    {
        $ids = $request->ids;

        $model = new BookingB2c();

        $checking_dispute = BookingB2c::whereIn('id', $ids)->get(['id', 'disputed_status']);

        $trueIds = [];
        $falseIds = [];

        foreach ($checking_dispute as $item) {

            $id = $item->id;
            $status = $item->disputed_status;

            if ($status === 'true') {
                $trueIds[] = $id;
            } else {
                $falseIds[] = $id;
            }
        }

        // Process true IDs outside the loop to avoid repeated database calls
        $existingBookings = CourierAssign_Request_b2c::whereIn('booking_id', $trueIds)->pluck('booking_id')->toArray();

        $unassignedBookings = array_diff($trueIds, $existingBookings);
        // dd($unassignedBookings);
        if (empty($unassignedBookings)) {

            $result = [
                "status" => "false",
                "message" => "All bookings are already assigned"
            ];
        } else {
            $result = $model->find_couriers_allocations($unassignedBookings);
        }


        // Process false IDs only if there are any
        if (!empty($falseIds)) {
            $tags = forword_audit_b2c::whereIn('booking_id', $falseIds)->get(['booking_id', 'response']);

            // Downloading Excel of errors
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

            // Mapping data with response tags
            $dataWithTags = $data->map(function ($item) use ($tags) {
                $tag = $tags->firstWhere('booking_id', $item->id);
                return [
                    'order_no' => $item->order_no,
                    'Business Type' => $item->business_type,
                    'AWB No' => $item->awb_no,
                    'Payment Mode' => $item->payment_mode,
                    'Item Price' => $item->item_price,
                    'COD Due' => $item->cod_due,
                    'Receiver Name' => $item->receiver_name,
                    'Receiver Address' => $item->receiver_address,
                    'Receiver Address 2' => $item->receiver_address_2,
                    'Receiver State' => $item->receiver_state,
                    'Receiver City' => $item->receiver_city,
                    'Receiver Pincode' => $item->receiver_pincode,
                    'Receiver Contact No' => $item->receiver_contactno,
                    'Receiver Alt Contact No' => $item->receiver_alt_contactno,
                    'Item SKU' => $item->item_sku,
                    'Item Name' => $item->item_name,
                    'Item Height' => $item->item_height,
                    'Item Length' => $item->item_length,
                    'Item Weight' => $item->item_weight,
                    'Item Width' => $item->item_Width,
                    'Item Qty' => $item->item_qty,
                    'Order Type' => $item->order_type,
                    'Client ID' => $item->client_id,
                    'Warehouse ID' => $item->warehouse_id,
                    'response' => $tag ? $tag->response : null,
                ];
            });

            // Export to Excel
            $excelExport = new error_b2c($dataWithTags);
            $filename = 'forword-booking-b2b.xlsx';

            return ExcelFacade::download($excelExport, $filename);

        }
        return response()->json($result);

    }

    public function assign_labels_b2c(Request $request)
    {

        try {
            $ids = $request->ids;
            $responseData = ['zipFile' => null]; // Initialize response data for zip file
            $pdfBaseUrl = 'http://127.0.0.1:8000/';
            $pdfs = []; // Array to store paths of generated PDFs

            // Fetch bookings
            $bookings = BookingB2c::whereIn('id', $ids)->get();

            foreach ($bookings as $booking)
            {
                $booking_id = $booking->id;
                $client_id = $booking->client_id;

                // Fetch label ids directly without fetching all labels
                $label_ids = Selected_label::where('client_id', $booking->client_id)->pluck('label_id')->toArray();

                // Fetch label designs directly without fetching all label designs
                $label_designs = Lable_design::whereIn('id', $label_ids)->get();
                $data['data'] = Lable_design::where('id', '1')->first();
                $setting = Label_setting::where('design_id', $data['data']->id)->first();
                // Generate and store PDFs
                foreach ($label_designs as $label_design)
                {
                    $label_name = $label_design->blade_name;

                    // Generate PDF
                    $dompdf = new Dompdf();
                    $html = view($label_name, compact('booking','setting'))->render();
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('A4', 'portrait');
                    $dompdf->render();

                    // Save PDF to temporary directory
                    $pdfFilePath = sys_get_temp_dir() . "/booking_{$booking->id}_client_{$client_id}_label_{$label_design->id}.pdf";
                    file_put_contents($pdfFilePath, $dompdf->output());
                    $pdfs[] = $pdfFilePath; // Add PDF path to array
                }
            }

            // Create a zip file containing all the PDFs
            $zipFileName = 'booking_labels.zip';
            $zipFilePath = storage_path('app/public/') . $zipFileName;
            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                foreach ($pdfs as $pdf) {
                    $zip->addFile($pdf, basename($pdf)); // Add PDF file to zip
                }
                $zip->close();
                $responseData['zipFile'] = Storage::url($zipFileName); // Store the zip file path
            } else {
                // Handle error if zip file creation fails
            }

            // Return the response containing the zip file path
            return response()->json($responseData);
        } catch (\Exception $e) {
            // Log any exceptions
            Log::error("Error: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred. Please check the logs for details.'], 500);
        }
    }

    // download Invoices

    public function download_invoice(Request $request)
    {
        $ids = $request->ids;
        $pdfs = [];

        foreach ($ids as $id) {
            $booking = BookingB2c::find($id);

            if ($booking) {
                // HTML content for the PDF
                $html = '
                <table width="80%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tr>
                  <td height="20"></td>
                </tr>
                <tr>
                  <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                      <tr class="hiddenMobile">
                        <td height="40"></td>
                      </tr>
                      <tr class="visibleMobile">
                        <td height="30"></td>
                      </tr>

                      <tr>
                        <td>
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <td>
                                  <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                    <tbody>
                                    //   <tr>
                                    //     <td align="left"> <img src="http://www.supah.it/dribbble/017/logo.png" width="32" height="32" alt="logo" border="0" /></td>
                                    //   </tr>
                                      <tr class="hiddenMobile">
                                        <td height="40"></td>
                                      </tr>
                                      <tr class="visibleMobile">
                                        <td height="20"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; color: #5b5b5b; , sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                          Hello, Philip Brooks.
                                          <br> Thank you for shopping from our store and for your order.
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table width="50%" border="0" cellpadding="0" cellspacing="0" align="center" class="col">
                                    <tbody>
                                      <tr class="visibleMobile">
                                        <td height="20"></td>
                                      </tr>
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 21px; color: #ff0000; letter-spacing: -1px; , sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                          Invoice
                                        </td>
                                      </tr>
                                      <tr>
                                      <tr class="hiddenMobile">
                                        <td height="50"></td>
                                      </tr>
                                      <tr class="visibleMobile">
                                        <td height="20"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; color: #5b5b5b; , sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                          <small>ORDER</small> #800000025<br />
                                          <small>MARCH 4TH 2016</small>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <!-- /Header -->
              <!-- Order Details -->
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tbody>
                  <tr>
                    <td>
                      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                        <tbody>
                          <tr>
                          <tr class="hiddenMobile">
                            <td height="60"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="40"></td>
                          </tr>
                          <tr>
                            <td>
                              <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                  <tr>
                                    <th style="font-size: 12px; , sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                                      Item
                                    </th>
                                    <th style="font-size: 12px; , sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                                      <small>SKU</small>
                                    </th>
                                    <th style="font-size: 12px; , sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                                      Quantity
                                    </th>
                                    <th style="font-size: 12px; , sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                                      Subtotal
                                    </th>
                                  </tr>
                                  <tr>
                                    <td height="1" style="background: #bebebe;" colspan="4"></td>
                                  </tr>
                                  <tr>
                                    <td height="10" colspan="4"></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                      Beats Studio Over-Ear Headphones
                                    </td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>MH792AM/A</small></td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                                    <td style="font-size: 12px; , sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$299.95</td>
                                  </tr>
                                  <tr>
                                    <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">Beats RemoteTalk Cable</td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>MHDV2G/A</small></td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                                    <td style="font-size: 12px; , sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$29.95</td>
                                  </tr>
                                  <tr>
                                    <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td height="20"></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- /Order Details -->
              <!-- Total -->
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tbody>
                  <tr>
                    <td>
                      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                        <tbody>
                          <tr>
                            <td>

                              <!-- Table Total -->
                              <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                      Subtotal
                                    </td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                                      $329.90
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                      Shipping &amp; Handling
                                    </td>
                                    <td style="font-size: 12px; , sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                      $15.00
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                      <strong>Grand Total (Incl.Tax)</strong>
                                    </td>
                                    <td style="font-size: 12px; , sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                      <strong>$344.90</strong>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; , sans-serif; color: #b0b0b0; line-height: 22px; vertical-align: top; text-align:right; "><small>TAX</small></td>
                                    <td style="font-size: 12px; , sans-serif; color: #b0b0b0; line-height: 22px; vertical-align: top; text-align:right; ">
                                      <small>$72.40</small>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- /Table Total -->

                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- /Total -->
              <!-- Information -->
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
                <tbody>
                  <tr>
                    <td>
                      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                        <tbody>
                          <tr>
                          <tr class="hiddenMobile">
                            <td height="60"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="40"></td>
                          </tr>
                          <tr>
                            <td>
                              <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                  <tr>
                                    <td>
                                      <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">

                                        <tbody>
                                          <tr>
                                            <td style="font-size: 11px; , sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                              <strong>BILLING INFORMATION</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="100%" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 12px; , sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                              Philip Brooks<br> Public Wales, Somewhere<br> New York NY<br> 4468, United States<br> T: 202-555-0133
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>


                                      <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                        <tbody>
                                          <tr class="visibleMobile">
                                            <td height="20"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 11px; , sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                              <strong>PAYMENT METHOD</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="100%" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 12px; , sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                              Credit Card<br> Credit Card Type: Visa<br> Worldpay Transaction ID: <a href="#" style="color: #ff0000; text-decoration:underline;">4185939336</a><br>
                                              <a href="#" style="color:#b0b0b0;">Right of Withdrawal</a>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                                <tbody>
                                  <tr>
                                    <td>
                                      <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                        <tbody>
                                          <tr class="hiddenMobile">
                                            <td height="35"></td>
                                          </tr>
                                          <tr class="visibleMobile">
                                            <td height="20"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 11px; , sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                              <strong>SHIPPING INFORMATION</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="100%" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 12px; , sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                              Sup Inc<br> Another Place, Somewhere<br> New York NY<br> 4468, United States<br> T: 202-555-0171
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>


                                      <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                        <tbody>
                                          <tr class="hiddenMobile">
                                            <td height="35"></td>
                                          </tr>
                                          <tr class="visibleMobile">
                                            <td height="20"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 11px; , sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                              <strong>SHIPPING METHOD</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="100%" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size: 12px; , sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                              UPS: U.S. Shipping Services
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr class="hiddenMobile">
                            <td height="60"></td>
                          </tr>
                          <tr class="visibleMobile">
                            <td height="30"></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- /Information -->
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">

                <tr>
                  <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                      <tr>
                        <td>
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <td style="font-size: 12px; color: #5b5b5b; , sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                  Have a nice day.
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="50"></td>
                      </tr>

                    </table>
                  </td>
                </tr>
                <tr>
                  <td height="20"></td>
                </tr>
              </table>`';

                // Initialize Dompdf
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);
                $dompdf = new Dompdf($options);

                // Load HTML content
                $dompdf->loadHtml($html);

                // Set paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // Render the HTML as PDF
                $dompdf->render();

                // Save the PDF file to the storage folder
                $pdfFileName = 'booking_' . $id . '.pdf';
                $pdfFilePath = storage_path('app/public/') . $pdfFileName;
                file_put_contents($pdfFilePath, $dompdf->output());

                // Store the file path
                $pdfs[] = $pdfFilePath;
            }
        }

        // Zip the PDF files
        $zipFileName = 'bookings.zip';
        $zipFilePath = storage_path('app/public/') . $zipFileName;
        $zip = new \ZipArchive();
        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            foreach ($pdfs as $pdf) {
                $zip->addFile($pdf, basename($pdf));
            }
            $zip->close();
        }

        // Return the URL of the generated zip file
        $zipFileUrl = asset('storage/' . $zipFileName);
        return response()->json(['zipFileUrl' => $zipFileUrl]);
    }
    // schdueled Pickup

    public function scheduled_pickup_b2c(Request $request)
    {
        $booking_id = $request->ids;
        $update_booking = BookingB2c::whereIn('id', $booking_id)->get();

        Mail::to("just.tushar20@gmail.com")->send(new Scheduled_pickup($update_booking));

        return response()->json(['status' => 'Scheduled Pick up'], 200);

    }

    public function cancel_booking_b2c(Request $request)
    {
        try {
            $ids = $request->ids;

            // Fetch relevant booking order numbers
            $orderNumbers = BookingB2c::whereIn('id', $ids)
                ->where('status', 'Assigned Request')
                ->pluck('order_no');

            foreach ($orderNumbers as $orderNumber) {
                // Fetch wallet logs for each order number
                $walletLogs = Wallet_log::where('booking_id', $orderNumber)->get();

                // Calculate total deducted amount for this order
                $totalDeductedAmount = $walletLogs->sum('amount');

                foreach ($walletLogs as $walletLog) {
                    $client_id = $walletLog->client_id;

                    // Refund the deducted amount
                    Client::where('id', $client_id)
                        ->increment('wallet_balance', $walletLog->amount);
                    $transactionId = 'T' . date('ymdHis') . mt_rand(100000000, 999999999);
                    // Create refund log
                    $refundLog = new Wallet_log;
                    $refundLog->client_id = $client_id;
                    $refundLog->booking_id = $orderNumber;
                    $refundLog->transactionId = $transactionId;
                    $refundLog->amount = $walletLog->amount;
                    $refundLog->description = "Booking refunded";
                    $refundLog->balance = Client::find($client_id)->wallet_balance;
                    $refundLog->status = "credit";
                    $refundLog->save();
                }
            }

            // Update booking status to 'cancel'
            BookingB2c::whereIn('order_no', $orderNumbers)->update(['status' => 'cancel']);

            return response()->json(['status' => 'Success', 'message' => "Booking canceled and refund has been generated"], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => "Error: " . $e->getMessage()], 500);
        }
    }

    // view individual transaction_log

    public function transaction_log(Request $request, $id)
    {
        $data['data'] = Wallet_log::where('client_id', $id)->get();
        return view('transaction-log', $data);
    }
    // transaction log filters

    public function transaction_filter(Request $request)
    {
        // Get input parameters
        $form_date = $request->from;
        $to_date = $request->to;
        $recent_orders = $request->latest_oldest;
        $booking_id = $request->order_number;
        $transaction_id = $request->transaction_id;
        $status = $request->status_type;

        // Start with base query
        $query = Wallet_log::query();

        // Add conditions based on input parameters
        if ($form_date && $to_date) {
            $query->whereBetween('created_at', [$form_date, $to_date]);
        }

        if ($recent_orders) {
            $query->orderBy('created_at', $recent_orders == 'latest' ? 'desc' : 'asc');
        }

        if ($booking_id) {
            $query->where('booking_id', $booking_id);
        }

        if ($transaction_id) {
            $query->where('transactionId', $transaction_id);
        }

        if ($status) {
            $query->where('status', $status);
        }

        // Execute the query
        $filteredLogs = $query->get();

        // Do something with $filteredLogs


        return response()->json(['status' => 'success', 'message'=>$filteredLogs], 200);
    }

}
