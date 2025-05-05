<?php

namespace App\Http\Controllers;

use App\Exports\Download_pins;
use App\Models\Booking;
use App\Models\City;
use App\Models\Pin_Code;
use App\Models\Regions;
use App\Models\Service_Center;
use App\Models\State;
use App\Models\Uploaded_pin;
use Illuminate\Database\QueryException;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Imports\Excel; // Check this import statement
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{


    // Country CRUD
    public function create_country(Request $request)
    {
        $check = Country::Where("country_name", $request->country_name)->count();

        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'Country Already Exist']);
        } else {
            $res = new Country;
            $res->country_name = $request->country_name;
            $res->country_code = $request->country_code;
            $res->status = 'true';
            $res->save();

            return response()->json(['status' => 'success', 'message' => 'Country Created']);
        }

    }
    public function update_country(Request $request)
    {
        $check = Country::where("country_name", $request->country_name)->count();

        if ($check) {

            $sta = Country::find($request->id);
            $sta->country_code = $request->country_code;
            $sta->status = $request->status;
            $sta->save();
            return back()->with('update', 'Update Successfully');

        } else {

            $res = Country::find($request->id);
            $res->country_name = $request->country_name;
            $res->country_code = $request->country_code;
            $res->status = $request->status;
            $res->save();
            return back()->with('update', 'Update Successfully');

        }

    }

    public function delete_country(Request $request)
    {
        $check = Country::where('id', $request->id)->delete();
        if ($check) {
            echo 'Data Delete Successfully';
        } else {
            echo 'Error';
        }
    }

    public function create_regions(Request $request)
    {

        $check = Regions::Where("region_name", $request->region_name)
            ->Where("country_name", $request->country_name)
            ->count();
      

        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'Region Already Exist']);
        } else {
            $res = new Regions;
            $res->region_code = $request->region_code;
            $res->region_name = $request->region_name;
            $res->country_name = $request->country_name;
            $res->status = "true";
            $res->save();

            return response()->json(["status" => "success", "message" => "Region Created"]);
        }
    }


    public function update_regions(Request $request)
    {
        $check = Regions::Where("region_name", $request->region_name)
            ->Where("country_name", $request->country_name)
            ->count();


        if ($check) {

            $sta = Regions::find($request->id);
            $sta->region_code = $request->region_code;
            $sta->status = $request->status;
            $sta->save();

            return back()->with('update', 'Update Successfully');

        } else {
            $res = Regions::find($request->id);
            $res->region_code = $request->region_code;
            $res->region_name = $request->region_name;
            $res->country_name = $request->country_name;
            $res->status = $request->status;
            $res->save();

            return back()->with('update', 'Update Successfully');
            
        }
    }

    public function delete_regions(Request $request)
    {
        $check = Regions::where('id', $request->id)->delete();
        if ($check) {
            echo "Data Delete Succssully";
        } else {
            echo "Error";
        }
    }

    // State CRUD
    public function create_state(Request $request)
    {
        $check = State::where('state_name', $request->State_name)
            ->where('region_name', $request->regions_name)
            ->count();

        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'State Already Exist']);
        } else {
            $res = new State;
            $res->state_code = $request->State_code;
            $res->state_name = $request->State_name;
            $res->region_name = $request->regions_name;
            $res->status = "true";
            $res->save();

            return response()->json(["status" => "success", "message" => "State Created"]);
        }
    }

    public function update_state(Request $request)
    {
        $check = State::where('state_name', $request->State_name)
        ->where('region_name', $request->region_name)
        ->count();
        

        if ($check) {

            $sta = State::find($request->id);
            $sta->state_code = $request->State_code;
            $sta->status = $request->status;
            $sta->save();

            return back()->with('update', 'Update Successfully');

        } else {
            $res = new State;
            $res->state_code = $request->State_code;
            $res->state_name = $request->State_name;
            $res->region_name = $request->region_name;
            $res->status = $request->status;
            $res->save();

            return back()->with('update', 'Update Successfully');
        }
 
    }

    public function delete_state(Request $request)
    {
        $check = State::where('id', $request->id)->delete();
        if ($check) {
            echo 'Data Delete successfully';
        } else {
            echo 'Error';
        }
    }

    // City CRUD

    public function create_city(Request $request)
    {
        $check = City::where('city_name', $request->city_name)->count();
        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'City Already Exist']);
        } else {
            $res = new City;
            $res->city_code = $request->city_code;
            $res->city_name = $request->city_name;
            $res->state_name = $request->state_name;
            $res->save();
            return response()->json(["status" => "success", "message" => "City Created"]);
        }
    }
    public function update_city(Request $request)
    {
      
        $check = City::where('city_name', $request->city_name)->count();

        if ($check) {
            $sta = City::find($request->id);
            $sta->state_name = $request->State_name;
            $sta->status = $request->status;
            $sta->save();
            return back()->with('update', 'Update Successfully');
        } else {
            $res = City::find($request->id);
            $res->city_code = $request->city_code;
            $res->city_name = $request->city_name;
            $res->state_name = $request->State_name;
            $res->status = $request->status;
            $res->save();

            return back()->with('update', 'Update Successfully');
        }
 
    }

    public function delete_city(Request $request)
    {
        $check = City::where('id', $request->id)->delete();
        if ($check) {
            echo 'Data Delete Successfully';
        } else {
            echo 'Error';
        }
    }

    // Service Center CRUD

    public function create_service_center(Request $request)
    {

        $check = Service_Center::where('service_code', $request->service_code)->count();

        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'Service Center Already Exist']);
        } else {
            $res = new Service_Center;
            $res->service_code = $request->service_code;
            $res->service_name = $request->service_name;
            $res->pin_code = $request->pincode;
            $res->city_name = $request->city_name;
            $res->state = $request->state;
            $res->region = $request->region;
            $res->center_address = $request->center_address;
            $res->status = "true";
            $res->save();

            return response()->json(["status" => "success", "message" => "Service Center Created"]);
        }
    }
    public function update_service_center(Request $request)
    {
        $update = Service_Center::where('id', $request->id)->update([

            'service_code' => $request->service_code,
            'service_name' => $request->service_name,
            'pin_code' => $request->pincode,
            'state' => $request->state,
            'region' => $request->region,
            'city_name' => $request->city_name,
            'center_address' => $request->center_address,
            'status' => $request->status,
        ]);

        if ($update) {
            // return response()->json(['status'=> 'success', 'message'=> 'updated']);
            return back();
        } else {
            return response()->json(['status' => 'error', 'message' => 'error']);
        }
    }

    public function delete_service_center(Request $request)
    {
        $check = Service_Center::where('id', $request->id)->delete();
        if ($check) {
            echo 'Data Delete Successfully';
        } else {
            echo 'Error';
        }
    }

    // Pin code

    public function create_pin_code(Request $request)
    {
        $check = Pin_Code::where('pin_code', $request->pin_code)->count();
      

        if ($check) {
            return response()->json(['status' => 'false', 'message' => 'Pin Code Already Exist']);
        } else {
            $res = new Pin_Code;
            $res->pin_code = $request->pin_code;
            $res->city_name = $request->city_name;
            $res->save();

            return response()->json(["status" => "success", "message" => "Pin Created"]);
        }
    }
    public function update_pin_code(Request $request)
    {
        $check = Pin_Code::where('pin_code', $request->pin_code)->count();

        if ($check) {
            $sta = Pin_Code::find($request->id);
            $sta->city_name = $request->city_name;
            $sta->status = $request->status;
            $sta->save();

            return back()->with('update', 'Update Successfully');
        } else {
            $res = new Pin_Code;
            $res->pin_code = $request->pin_code;
            $res->city_name = $request->city_name;
            $res->status = $request->status;
            $res->save();
            return back()->with('update', 'Update Successfully');
        }
    }

    public function delete_pin_code(Request $request)
    {
        $check = Pin_Code::where('id', $request->id)->delete();
        if ($check) {
            echo "Data Delete Successfully";
        } else {
            echo "Error";
        }
    }
    // Zone CRUD
    public function create_zone(Request $request)
    {

        $data_destination = explode(',', $request->input('destination'));
        $destination_cityName = trim($data_destination[0]);
        $destination_pinCode = trim($data_destination[1]);


        $data_origin = explode(',', $request->input('origin'));
        $origin_cityName = trim($data_origin[0]);
        $origin_pinCode = trim($data_origin[1]);

        $check = Zone::where('origin_pincode', $origin_pinCode)
            ->where('destination_pincode', $destination_pinCode)
            ->count();
            

        if ($check)
        {
           return response()->json(['status'=> 'false','message'=> 'Zone Already Exist']);
        }
        else
        {
    
            $res = new Zone;
            $res->origin = $origin_cityName;
            $res->origin_pincode = $origin_pinCode;
            $res->destination = $destination_cityName;
            $res->destination_pincode = $destination_pinCode;
            $res->zone_type = $request->zone_type;
            $res->status = "true";
            $res->save();

            return response()->json(["status"=> "success","message"=> "Zone Created"]);
        }

    }
    public function update_zone(Request $request)
    {
        // return $request->all();

        $data_destination = explode(',', $request->input('destination'));
        $destination_cityName = isset($data_destination[0]) ? trim($data_destination[0]) : null;
        $destination_pinCode = isset($data_destination[1]) ? trim($data_destination[1]) : null;
        
        $data_origin = explode(',', $request->input('origin'));
        $origin_cityName = isset($data_origin[0]) ? trim($data_origin[0]) : null;
        $origin_pinCode = isset($data_origin[1]) ? trim($data_origin[1]) : null;
        
        $res = Zone::find($request->id);
        if (!empty($origin_cityName)) {
            $res->origin = $origin_cityName;
        }
        if (!empty($origin_pinCode)) {
            $res->origin_pincode = $origin_pinCode;
        }
        if (!empty($destination_cityName)) {
            $res->destination = $destination_cityName;
        }
        if (!empty($destination_pinCode)) {
            $res->destination_pincode = $destination_pinCode;
        }
        $res->zone_type = $request->zone_type;
        $res->save();
        

        return back()->with('update', 'Update Successfully');
        // $check = Zone::where('origin', $request->origin)
        // ->where('destination', $request->destination)
        // ->count();

        // if($check)
        // {
        //     $update = Zone::where('id', $request->id)->update([
        //         'zone_type' => $request->zone_type,
        //         'status' => $request->status,
        //     ]);

        //     return back()->with('update', 'Update Successfully');
        // }
        // else
        // {
        //     $update = Zone::where('id', $request->id)->update([
        //         'origin' => $request->origin,
        //         'destination' => $request->destination,
        //         'zone_type' => $request->zone_type,
        //         'status' => $request->status,
        //     ]);
        //     return back()->with('update', 'Update Successfully');
        // }
    }

    public function delete_zone(Request $request)
    {
        $check = Zone::where('id', $request->id)->delete();
        if ($check) {
            echo "Data Delete Successfully";
        } else {
            echo "Error";
        }
    }

    // upload pins

    public function upload_pin(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {

            $data = [];

            if ($request->client !== null) {
                $data['client'] = $request->client;
            }

            if ($request->courier !== null) {
                $data['courier'] = $request->courier;
            }

            $import = new Excel($data);

            $file = $request->file('file');
            ExcelFacade::import($import, $file);

            if ($request->client !== null && $request->courier !== null) {
                return response()->json(["status" => "success", "message" => "Excel file uploaded and data saved to the database."]);
            } else {
                return response()->json(["status" => "success", "message" => "Excel file uploaded."]);
            }

        } catch (\Exception $e) {
            return response()->json(["status" => "false", "message" => $e->getMessage()]);
        }




    }

    // Delete Pin codes

    public function delete_pincodes(Request $request)
    {
        $ids = $request->ids;

        Uploaded_pin::whereIn('id', $ids)->delete();
        return response()->JSON(['status' => 'success', 'message' => 'Data Deleted']);

    }

    public function country_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = Country::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = Country::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = Country::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }


    public function regions_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = Regions::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = Regions::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = Regions::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function state_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = State::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = State::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = State::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function city_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = City::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = City::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = City::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function servicecenter_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = Service_Center::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = Service_Center::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = Service_Center::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function pincode_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = Pin_Code::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = Pin_Code::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = Pin_Code::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function zone_data_filter(Request $request)
    {
        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        if ($form == null || $to == null) {
            if (!$latest_oldest == null) {
                $getdata = Zone::orderBy('id', $latest_oldest)->get();
                return response()->JSON($getdata);
            }
        } else {
            if (!$latest_oldest == null) {
                $data = Zone::whereBetween('created_at', [$form, $to])->orderBy('id', $latest_oldest)->get();
                return response()->JSON($data);
            } else {
                $data = Zone::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
        }
    }

    public function export_pins(Request $request)
    {
        $selectedColumns = ['pincode', 'shortcode', 'valuecappings', 'cod', 'prepaid', 'reverse_pickup', 'surface', 'air', 'codepriority', 'pppriority'];
        $columnNames = Schema::getColumnListing((new Uploaded_pin())->getTable());
        $selectedColumnNames = array_intersect($columnNames, $selectedColumns);



        if ($request->courier_id == 'all') {
            $data = Uploaded_pin::select(...$selectedColumnNames)->get();
        } else {
            // Define your where condition here
            $whereCondition = [
                // Example where condition
                ['courier', '=', $request->courier_id],

            ];

            $data = Uploaded_pin::select(...$selectedColumnNames)
                ->where($whereCondition)
                ->get();
        }

        $data->prepend($selectedColumnNames);
        return ExcelFacade::download(new Download_pins($data), 'forword-booking-b2b.xlsx');

    }

    public function search_pin_codes(Request $request)
    {
       $getdata = Pin_Code::where('city_name',$request->search)->where('status','true')->get();
   
       $PinCode = [];
       $cityNames = [];

       foreach ($getdata as $getdatas) {
           $PinCode[] = $getdatas->pin_code;
           $cityNames[] = $getdatas->city_name;
       }
       return response()->json(['name' =>$cityNames, 'pin_code' => $PinCode ]);
    }

}
