<?php

namespace App\Http\Controllers;

use App\Models\All_api;
use App\Models\Api_status;
use App\Models\Courier_comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApimasterController extends Controller
{
     public function all_api(Request $request)
     {
        $api = All_api::all();
        return view('api.all-api',compact('api'));
     }

     public function create_api_name(Request $request)
     {
        $check = All_api::where('courier_name', $request->courier)->count();

        if (!$check)
        {
            $res = new All_api;
            $res->courier_name = $request->courier;
            $res->status = "1";
            $res->save();
            return redirect()->back()->with('success', 'API Created');
        }
        else
        {
             return redirect()->back()->with('error', 'API Already Exist');
        }

     }
     public function apis_status(Request $request)
     {
             $api = All_api::all();
             $status = Api_status::with('courierss')->get();
              return view('api.all-api-status',compact('api','status'));
     }
     public function create_api_status(Request $request)
     {
        $impload = implode(',', $request->status_name);
        $existingStatus = Api_status::where('courier', $request->courier)->where('status_name', $impload)->first();

        if (!$existingStatus) {
            $newStatus = new Api_status;
            $newStatus->courier = $request->courier;
            $newStatus->status_name = $impload;
            $newStatus->status = "1";
            $newStatus->save();

            return redirect()->back()->with('success', 'API Status Created');
        } else
        {
            $existingStatus->status_name = $impload;
            $existingStatus->status = "1"; // Set the status to whatever value you want to update
            $existingStatus->save();

            return redirect()->back()->with('success', 'API Status Updated');
        }
     }

     public function get_apis_status(Request $request)
     {
        $courier_id = $request->client_id;

        $get = Api_status::where('courier',$courier_id)->first();
        $data = $get->status_name;

        $expload = explode(',',$data);
        foreach ($expload as $value)
        {
            echo '<option value=' . $value. '>' . $value . '</option>';
        }
      }
      public function api_comments(Request $request)
      {
         $api = All_api::all();
         $status = Api_status::with('courierss')->get();
         $comments = Courier_comments::all();
         return view('api.all-api-comments',compact('api','status','comments'));
      }

      public function create_courier_comments(Request $request)
      {
        $impload = implode(',',$request->comments_name);
        $check = Courier_comments::where('courier', $request->courier)->where('courier_comments',$impload)->count();

        if (!$check)
        {

            $res = new Courier_comments;
            $res->courier = $request->courier;
            $res->status_name = $request->status_name;
            $res->courier_comments = $impload;
            $res->status = "1";
            $res->save();

            return redirect()->back()->with('success', 'Courier Comments Created');
        }
        else
        {
             return redirect()->back()->with('error', 'Courier Comments Already Exist');
        }
      }
}
