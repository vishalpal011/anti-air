<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Courier;
use App\Models\State;
use App\Models\Courier_allocated;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function create_courier(Request $request)
    {

        $check = Courier::where("courier_display_name", $request->courier_display_name)->count();

        if ($check) {
            return response()->json(['status' => ['error' => 'false'], 'message' => 'Courier Alerdy Exist']);
        } else {
            $res = new Courier();
            $res->courier_id = $request->courier_id;
            $res->courier_display_name = $request->courier_display_name;
            $res->courier_registration_name = $request->courier_registration_name;
            $res->courier_rates = $request->courier_rates;
            $res->courier_cod_cycle = $request->courier_cod_cycle;
            $res->courier_zone = $request->courier_zone;
            $res->courier_loss = $request->courier_loss;
            $res->courier_weight = $request->courier_weight;
            $res->courier_billing = $request->courier_billing;
            $res->weight_dispute_timeline = $request->weight_dispute_timeline;
            $res->status = "true";
            $res->save();

            return response()->json(['status' => 'success', 'message' => 'Courier Created']);

        }
    }

    public function view_Courier(Request $request)
    {
        $data['data'] = Courier::orderBy('id','DESC')->get();
        $data['active'] = Courier::where('status', 'true')->count();
        $data['deactive'] = Courier::where('status', 'false')->count();
        return view('view-courier', $data);
    }

    public function edit_Courier(Request $request, $id)
    {
        $data['data'] = Courier::find($id);

        return view('edit-courier', $data);

    }

    public function update_Courier(Request $request)
    {
        $update = Courier::where('id', $request->id)->update([
            'courier_display_name' => $request->courier_display_name,
            'courier_registration_name' => $request->courier_registration_name,
            'courier_rates' => $request->courier_rates,
            'courier_cod_cycle' => $request->courier_cod_cycle,
            'courier_zone' => $request->courier_zone,
            'courier_loss' => $request->courier_loss,
            'courier_weight' => $request->courier_weight,
            'courier_billing' => $request->courier_billing,
            'weight_dispute_timeline' => $request->weight_dispute_timeline,
            'status' => $request->status,

        ]);

        if ($update) {
            return response()->json(['status' => 'success', 'message' => 'Courier Updated']);
        } else {
            return response()->json(['status' => ['error' => 'false'], 'message' => 'Courier Alerdy Exist']);
        }
    }

    public function updateStatus(Request $request)
    {

        $selectedIds = $request->input('ids', []);
        $status = $request->input('status');

        Courier::whereIn('id', $selectedIds)->update(['status' => $status]);

        // return response()->json(['message' => $status]);
        return response()->json(['status' => 'success']);
    }
    public function delete_courier(Request $request)
    {
       $delete = Courier::where('id', $request->id)->delete();
       if($delete)
       {
        echo 'Data Delete Successfully';
       }
       else
       {
        echo 'Data Delete Successfully';
       }
    }

    public function courier_data_filter(Request $request)
    {

       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Courier::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Courier::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Courier::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }

    public function courier_allocation(Request $request)
    {
       $data['client'] = Client::where('status','true')->orderBy('id','DESC')->get();
       $data['courier'] = Courier::where('status','true')->orderBy('id','DESC')->get();
       $data['courier_count'] = Courier::count();
       $data['active'] = Courier_allocated::where('status','true')->count();
       $data['deactive'] = Courier_allocated::where('status','false')->count();
       $data['allocated'] = Courier_allocated::with('clients','couriers')->orderBy('id','DESC')->get();

       return view('courier-allocation',$data);


    }

    public function create_courier_allocated(Request $request)
    {
        $res = new Courier_allocated;
        $res->client_id = $request->client_id;
        $res->courier_id = $request->courier_id;
        $res->priority = $request->priority;
        $res->status = 'true';
        $res->save();
        return response()->json(['status' => 'success', 'message' => 'Create Allocation successfully']);
    }


    public function update_courier_allocateds(Request $request)
    {
        if($request->type =='priority')
        {
            $res = Courier_allocated::find($request->id);
            $res->priority = $request->priority;
            $res->save();

            if($res)
            {
                return response()->json(['message'=>'successfully','priority' => $request->priority]);
            }
        }
        else
        {
            $res = Courier_allocated::find($request->id);
            $res->courier_id = $request->courier_value;
            $res->save();

            if($res)
            {
                $data = Courier_allocated::where('id',$request->id)->first();
                return response()->json(['message'=>'successfully','courier_name' =>
                optional($data->couriers)->courier_display_name]);
            }
        }


    
        //   $id = $request->id;
        //   $courier_id = $request->courier_id;
        //   $elementType = $request->input('element_type');
        //   $selectedName = $request->selectedName;

        //     if ($elementType == '0')
        //     {
        //             Courier_allocated::where('id',$id)->update(['courier_id'=>$courier_id]);
        //             return response()->json(['status'=>'editselect2','message' => $selectedName]);
        //     }
        //     else
        //     {
        //             Courier_allocated::where('id',$id)->update(['priority'=>$courier_id]);
        //              return response()->json(['status'=>'priority','message' => $selectedName]);
        //     }

    }


    public function delete_courier_allocated(Request $request)
    {
        $delete = Courier_allocated::where('id', $request->id)->delete();
        if($delete)
        {
         echo 'Data Delete Successfully';
        }
        else
        {
         echo 'Data Delete Successfully';
        }
    }

    public function allocation_status(Request $request)
    {
        $res = Courier_allocated::find($request->id);
        $res->status = $request->status;
        $res->save();
    }

}
