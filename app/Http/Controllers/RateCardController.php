<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Courier_rate;
use App\Models\Courier_service;

class RateCardController extends Controller
{
    public function create_courier_rates(Request $request)
    {
       $data['courier'] = Courier::where('status','true')->orderBy('id','DESC')->get();
       $data['service'] = Courier_service::where('status','true')->orderBy('id','DESC')->get();
       return view('create-courier-rates',$data);
    }


    public function upload_courier_rate(Request $request)
    {
        $res = new Courier_rate;
        $res->courier_id = $request->courier;
        $res->service_id = $request->service;
        $res->type = $request->type;
        $res->weight = $request->weight;
        $res->zone_a = $request->zone_a;
        $res->zone_b = $request->zone_b;
        $res->zone_c = $request->zone_c;
        $res->zone_d = $request->zone_d;
        $res->zone_e = $request->zone_e;
        $res->zone_f = $request->zone_f;
        $res->zone_g = $request->zone_g;
        $res->fsc_percentage = $request->fsc_percentage;
        $res->gst_percentage = $request->gst_percentage;
        $res->cod = $request->cod;
        $res->cod_percentage = $request->cod_percentage;
        $res->other_charges = $request->other_charges;
        $res->cod_cycle = $request->cod_cycle;
        $res->status = 'true';
        $res->save();

        return response()->json(['status' => 'success', 'message' => 'Create Successfully']);
    
    }


    public function view_courier_rates(Request $request)
    {
       $data['data'] = Courier_rate::orderBy('id','DESC')->get();
       $data['active'] = Courier_rate::where('status','true')->count();
       $data['deactive'] = Courier_rate::where('status','false')->count();
       return view('view-courier-rate',$data);
    }

    public function courier_service(Request $request)
    {
       $data['data'] = Courier_service::orderBy('id','DESC')->get();
       $data['active'] = Courier_service::where('status','true')->count();
       $data['deactive'] = Courier_service::where('status','false')->count();
        return view('courier-service',$data);
    }

    public function create_courier_service(Request $request)
    {
       $count = Courier_service::where('service',$request->service)->count();
       if($count > 0)
       {
        return response()->json(['status' => 'already', 'message' => 'Already Exist']);
       }
       else
       {
            $res = new Courier_service;
            $res->service = $request->service;
            $res->status = $request->status;
            $res->save();
       }        
        return response()->json(['status' => 'success', 'message' => 'Create Successfully']);
    }

    public function update_courier_service(Request $request)
    {
        $res = Courier_service::find($request->id);
        $res->service = $request->service;
        $res->status = $request->status;
        $res->save();
        return back();
 
    }


    public function delete_courier_service(Request $request)
    {
        $check = Courier_service::where('id',$request->id)->delete();
        if($check)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }

    public function edit_courier_rate(Request $request, $id)
    {
        $data['data'] = Courier_rate::where('id',$id)->first();
        $data['courier'] = Courier::where('status','true')->orderBy('id','DESC')->get();
        $data['service'] = Courier_service::where('status','true')->orderBy('id','DESC')->get();
        return view('edit-courier-rate',$data);
    }

    public function update_courier_rate(Request $request)
    {
        $res = Courier_rate::find($request->id);
        $res->courier_id = $request->courier;
        $res->service_id = $request->service;
        $res->type = $request->type;
        $res->weight = $request->weight;
        $res->zone_a = $request->zone_a;
        $res->zone_b = $request->zone_b;
        $res->zone_c = $request->zone_c;
        $res->zone_d = $request->zone_d;
        $res->zone_e = $request->zone_e;
        $res->zone_f = $request->zone_f;
        $res->zone_g = $request->zone_g;
        $res->fsc_percentage = $request->fsc_percentage;
        $res->gst_percentage = $request->gst_percentage;
        $res->cod = $request->cod;
        $res->cod_percentage = $request->cod_percentage;
        $res->other_charges = $request->other_charges;
        $res->cod_cycle = $request->cod_cycle;
        $res->status = $request->status;
        $res->save();

        return redirect('view-courier-rates');
    }

    public function delete_courier_rate(Request $request)
    {
        $check = Courier_rate::where('id',$request->id)->delete();
        if($check)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }

}
