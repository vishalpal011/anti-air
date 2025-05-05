<?php

namespace App\Http\Controllers;

use App\Models\Sales_lead;
use Illuminate\Http\Request;

class SalesLeadController extends Controller
{
    public function create_sales(Request $request)
    {
        // $check = Sales_lead

        $res = new Sales_lead();
        $res->company_name = $request->company_name;
        $res->brand_name = $request->brand_name;
        $res->vendor_name = $request->vendor_name;
        $res->decision_maker_name = $request->decision_maker_name;
        $res->decicion_maker_number = $request->decicion_maker_number;
        $res->decicion_maker_email = $request->decicion_maker_email;
        $res->contact_person_name = $request->contact_person_name;
        $res->contact_person_number = $request->contact_person_number;
        $res->contact_person_email = $request->contact_person_email;
        $res->lead_date = $request->lead_date;
        $res->sales_person_name  = $request->sales_person_name;
        $res->service_type  = $request->service_type;
        $res->volume = $request->volume;
        $res->lead_type = $request->lead_type;
        $res->office_address = $request->office_address;
        $res->status = "false";
        $res->save();
        return response()->json(["status"=>"success", "message" =>"Sales Lead Created"]);
    }
    public function update_sales(Request $request)
    {
        $update = Sales_lead::where("id", $request->id)->update([

            'company_name' =>  $request->company_name,
            'brand_name' => $request->brand_name,
            'vendor_name' => $request->vendor_name,
            'decision_maker_name' => $request->decision_maker_name,
            'decicion_maker_number' => $request->decicion_maker_number,
            'decicion_maker_email' => $request->decicion_maker_email,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_number' => $request->contact_person_number,
            'contact_person_email' => $request->contact_person_email,
            'lead_date' => $request->lead_date,
            'sales_person_name' => $request->sales_person_name,
            'service_type' => $request->service_type,
            'volume' => $request->volume,
            'lead_type' => $request->lead_type,
            'office_address' => $request->office_address,
            'status' => $request->status,

        ]);

        if($update)
        {
            return back();

        }
        else
        {
            return response()->json(["status" => "false", "message"=> "Something went wrong"]);

        }

    }

    public function delete_sales(Request $request)
    {
        $delete = Sales_lead::where("id", $request->id)->delete();
        if($delete)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }

    public function sales_data_filter(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Sales_lead::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Sales_lead::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Sales_lead::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }

    public function view_sales(Request $request)
    {
        $id = $request->id;
        $data['data'] = Sales_lead::where()->get();
        return view('view-sales', $data);

        // return response()->json($data, 200);
    }
}
