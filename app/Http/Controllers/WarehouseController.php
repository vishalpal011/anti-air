<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warehouse;
use App\Models\Client;

class warehouseController extends Controller
{
    public function creat_warehouse(Request $request)
    {
        $checking = warehouse::where('warehouse_name',$request->warehouse_name)->exists();

        if ($checking)
        {
            return response()->json(["status"=> "error","message"=> "warehouse is already exist"]);
        }
        else
        {
            $res = new warehouse;
            $res->client_id = $request->client;
            $res->business_name = $request->business_name;
            $res->warehouse_name = $request->warehouse_name;
            $res->warehouse_phone = $request->warehouse_phone_number;
            $res->pin_code = $request->courier_rates;
            $res->state = $request->state;
            $res->city = $request->city;
            $res->address = $request->address;
            $res->status = 'true';
            $res->save();
            return response()->json(["status"=> "success","message"=> "warehouse Created"]);
        }

    }

    public function view_warehouses(Request $request)
    {
        $data['data'] = warehouse::orderBy('id','DESC')->get();
        $data['active'] = warehouse::where('status','true')->count();
        $data['deactive'] = warehouse::where('status','false')->count();

        return view('view-warehouse',$data);
    }

    public function edit_warehouse($id)
    {
       $data['data'] = Warehouse::with('client')->where('id',$id)->first();
       $data['client'] = Client::where('status','true')->get();
       return view('edit-warehouse',$data);
    }

    public function update_warehouse(Request $request)
    {
        $res = warehouse::find($request->id);
        $res->client_id = $request->client;
        $res->business_name = $request->business_name;
        $res->warehouse_name = $request->warehouse_name;
        $res->warehouse_phone = $request->warehouse_phone_number;
        $res->pin_code = $request->courier_rates;
        $res->state = $request->state;
        $res->city = $request->city;
        $res->address = $request->address;
        $res->status = $request->status;
        $res->save();
        return response()->json(["status"=> "success","message"=> "warehouse Updated"]);
    }

    public function delete_warehouse(Request $request)
    {
        $delete = warehouse::where("id", $request->id)->delete();
        if($delete)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }

    public function warehouse_data_filter(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = warehouse::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = warehouse::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = warehouse::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }
}
