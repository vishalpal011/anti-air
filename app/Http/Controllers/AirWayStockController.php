<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Air_way_stock;
use App\Models\Air_way_inventory;
use App\Models\User;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\YourExport;


class AirWayStockController extends Controller
{
    public function show_users(Request $request)
    {
        // Retrieve data from the database based on user input
        $userInput = $request->input('code');
        $data = Client::select('client_id', 'first_name')
            ->where('client_id', $userInput)
            ->orWhere('first_name', 'like', '%' . $userInput . '%')
            ->get();

        return response()->json(['data' => $data]);

    }

    // Genrating awd codes

    function generateRandomCode($alphabeticLength = 5, $numericLength = 7)
    {
        $alphabeticPart = Str::random($alphabeticLength);
        $numericPart = mt_rand(1000000, 9999999); // Adjust the range based on your numeric length

        return strtoupper($alphabeticPart) . $numericPart;
    }
    public function create(Request $request)
    {
        $codes = [];
        $awb_counts = $request->input('aws_count');
        for ($i = 0; $i < $awb_counts; $i++)
        {
            $codes[] = $this->generateRandomCode();
        }

        $data = [
            'user_id' => $request->input('outline_squircle', null),
            'waybill_type' => $request->input('waybill_type', null),
            'cod' => $request->input('cod', null),
            'prepaid' => $request->input('prepaid', null),
            'rvp' => $request->input('rvp', null),

        ];

        $datas = json_encode($codes);
        $json = json_decode($datas, true);
        foreach ($json as $value) {
            $res = new Air_way_inventory;
            $res->user_id = $request->input('outline_squircle', null);
            $res->awb_codes = $value;
            $res->used_status = 'pending';
            $res->save();
        }

        $user = Air_way_stock::create($data);

        return response()->json(['status' => 'success']);
    }

    public function view_inventory(Request $request)
    {
        $data = [];
        $data['data'] = Air_way_stock::with('Clients')->get();
         $data['pending'] = Air_way_inventory::where('used_status', 'pending')->count();
        $data['used'] = Air_way_inventory::where('used_status', 'used')->count();
        $data['user'] = Air_way_stock::count();
        $data['userdata'] = Client::all();
         return view('view-inventory', $data);
    }

    public function download_awbcodes($user_id)
    {
        $selectedColumns = ['user_id', 'awb_codes', 'used_status'];

        $columnNames = \Schema::getColumnListing((new Air_way_inventory())->getTable());

        $selectedColumnNames = array_intersect($columnNames, $selectedColumns);

        $data = Air_way_inventory::select($selectedColumnNames)->where('user_id', $user_id)->get();
        $data->prepend($selectedColumnNames);
        return Excel::download(new YourExport($data), 'awb-inventory.xlsx');
    }

    public function awb_filter_data(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Air_way_stock::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Air_way_stock::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Air_way_stock::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }

    public function update_awb_inventory(Request $request)
    {

        $res = Air_way_stock::find($request->id);
        $res->user_id = $request->user;
        $res->waybill_type = $request->awb_type;
        $res->cod = $request->cod;
        $res->prepaid = $request->prepaid;
        $res->rvp = $request->rvp;
        $res->save();

        Air_way_inventory::where('user_id', $request->update_id)
       ->update([
           'user_id' => $request->user,
        ]);

       return back();

    }

    public function delete_awb_inventory(Request $request)
    {
       $awbinventory = Air_way_stock::where('id',$request->id)->first();
       $delete = Air_way_inventory::where('user_id',$awbinventory->user_id)->delete();
        if($delete)
        {
            Air_way_stock::where('id',$request->id)->delete();
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
       echo "Data Delete Successfully";
    }
    public function creat_awb_courier(Request $request)
    {
        $ids = $request->couries_id;
        $file = $request->file;
        // $couriers =
    }

}
