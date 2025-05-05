<?php

namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Client;
use App\Models\Pin_Code;
use App\Models\Regions;
use App\Models\State;
use App\Models\Uploaded_pin;
use Illuminate\Http\Request;
use App\Events\Clientevent;
class ClientController extends Controller
{

    public function all_client(Request $request)
    {
        $data['data'] = Client::orderBy('id','DESC')->get();
        $data['deactive'] = Client::where('status', 'false')->count();
        $data['active'] = Client::where('status', 'true')->count();
        return view('all-client',$data);
    }
    public function create_client(Request $request)
    {

        $check = Client::where('phone', $request->phone)->count();
        $otp = mt_rand(0000,9999);

        if ($check)
        {
            return response()->json(['status'=> 'false','message'=> 'Client is Already Exist']);

        }
        else
        {
            $res = new Client;
            $res->first_name = $request->first_name;
            $res->last_name = $request->last_name;
            $res->company_name = $request->company_name;
            $res->email = $request->email;
            $res->phone = $request->phone;
            $res->password = bcrypt($request->password);
            $res->otp = $otp;
            $res->business_type = $request->customDeliveryRadioIcon;
            if($request->customDeliveryRadioIcon == 'Personal')
            {
                // pan card image
                $pan = $request->file('personal_pan_card');
                $panName = time().'.'.$pan->getClientOriginalExtension();
                $pan->move('uploads/pan', $panName);
                $res->pan_card = $panName;

                // aadhar card image
                $aadhar = $request->file('personal_aadhar_card');
                $aadharName = time().'.'.$aadhar->getClientOriginalExtension();
                $aadhar->move('uploads/aadhar', $aadharName);
                $res->aadhar_card = $aadharName;


                // address proof
                $addressproof = $request->file('personal_address_proof');
                $addressproofName = time().'.'.$addressproof->getClientOriginalExtension();
                $addressproof->move('uploads/address_proof', $addressproofName);
                $res->address_proof = $addressproofName;


                //  cancel cheque
                 $companycheque = $request->file('personal_cancel_chaque');
                 $companychequeName = time().'.'.$companycheque->getClientOriginalExtension();
                 $companycheque->move('uploads/cancel_cheque', $companychequeName);
                 $res->cancel_cheque = $companychequeName;


                $res->bank_name = $request->personal_bank_name;
                $res->ifsc_code = $request->personal_ifsc_code;
                $res->account_number = $request->personal_account_number;
                $res->mobile_as_bank = $request->personal_mobile_as_bank;
                $res->person_billing_address = $request->person_billing_address;
            }
            else
            {
                 //    company gst
                $companypan = $request->file('company_gst');
                $companypanName = time().'.'.$companypan->getClientOriginalExtension();
                $companypan->move('uploads/gst', $companypanName);
                $res->company_gst = $companypanName;

                // pan card image
                $pan = $request->file('pan_card');
                $panName = time().'.'.$pan->getClientOriginalExtension();
                $pan->move('uploads/pan', $panName);
                $res->pan_card = $panName;


                // address proof
                $addressproof = $request->file('address_proof');
                $addressproofName = time().'.'.$addressproof->getClientOriginalExtension();
                $addressproof->move('uploads/address_proof', $addressproofName);
                $res->address_proof = $addressproofName;


                //  cancel cheque
                $companycheque = $request->file('cancel_chaque');
                $companychequeName = time().'.'.$companycheque->getClientOriginalExtension();
                $companycheque->move('uploads/cancel_cheque', $companychequeName);
                $res->cancel_cheque = $companychequeName;

                $res->bank_name = $request->bank_name;
                $res->ifsc_code = $request->ifsc_code;
                $res->account_number = $request->account_number;
                $res->mobile_as_bank = $request->mobile_as_bank;
            }

            $res->terms = $request->terms;
            $res->privacy = $request->privacy;
            $res->average_monthly_orders = $request->average_monthly_orders;
            $res->agreed_rates = $request->agreed_rates;
            $res->sales_person = $request->sales_person;
            $res->sales_person_email = $request->sales_person_email;
            $res->assigined_kam = $request->assigined_kam;
            $res->cod_cycle = $request->cod_cycle;
            $res->billing_cycle = $request->billing_cycle;
            $res->client_id = $request->client_id;
            $res->loss_liablity = $request->loss_liablity;
            $res->user_name = $request->user_name;
            $res->billing_pin_code = $request->billing_pin_code;
            $res->city = $request->city;
            $res->states = $request->states;
             $res->account = $request->account;
            $res->B2B = $request->B2B;
            $res->shipping_label = '4';
            $res->vendor_and_center = $request->vendor_and_center;
            $res->status = 'true';
            $res->save();

            $lastInsertedId = $res->id;

            $get_client = Client::where('id',$lastInsertedId)->first()->toarray();

            event(new Clientevent($get_client));

            // event(new Clientevent($data));
            return response()->json(["status"=> "success","message"=> "Client Created"]);


        }
    }

    public function view_client(Request $request, $id)
    {
        $data['data']  = Client::find($id);
        return view('view-client-details', $data);
    }

    public function get_pincode_data(Request $request)
    {
        $userInput = $request->input('code');
        $pinCode = Pin_Code::select('city_name')->where('pin_code', $userInput)->first();


        $city = $pinCode->city_name;
        $state = City::select('state_name')->where('city_name', $city)->first();

        $states = $state->state_name;


        return response()->json(['city' => $city, 'state' => $states]);


    }
    public function get_pincode_data2(Request $request)
    {
        $userInput = $request->input('code');
        $pinCode = Pin_Code::select('city_name')->where('pin_code', $userInput)->first();
        $city = $pinCode->city_name;
        $state = City::select('state_name')->where('city_name', $city)->first();
        $states = $state->state_name;

        $region = State::select('region_name')->where('state_name',$states)->first();
        $regions = $region->region_name;

        return response()->json(['city' => $city, 'state' => $states, 'regions'=>$regions]);


    }


    public function delete_client(Request $request)
    {
       $delete = Client::where('id',$request->id)->delete();
       if($delete)
       {
          echo 'Data Delete Successfully';
       }
       else
       {
        echo 'Error';
       }
    }

    public function client_update(Request $request)
    {
       $res =  Client::find($request->id);
       $res->first_name = $request->first_name;
       $res->last_name = $request->last_name;
       $res->email = $request->email_id;
       $res->phone = $request->phone;
       $res->status = $request->status;
       $res->save();
       return back();

    }


    public function client_docs_update(Request $request)
    {
       $res =  Client::find($request->id);

        // pan card image
        if($request->hasfile('pan_card'))
        {
            $pan = $request->file('pan_card');
            $panName = time().'.'.$pan->getClientOriginalExtension();
            $pan->move('uploads/pan', $panName);
            $res->pan_card = $panName;
        }

        // aadhar card image
        if($request->hasfile('aadhar_card'))
        {
            $aadhar = $request->file('aadhar_card');
            $aadharName = time().'.'.$aadhar->getClientOriginalExtension();
            $aadhar->move('uploads/aadhar', $aadharName);
            $res->aadhar_card = $aadharName;
        }


        // address proof
        if($request->hasfile('address_proof'))
        {
            $addressproof = $request->file('address_proof');
            $addressproofName = time().'.'.$addressproof->getClientOriginalExtension();
            $addressproof->move('uploads/address_proof', $addressproofName);
            $res->address_proof = $addressproofName;
        }


        //  cancel cheque
        if($request->hasfile('cancel_chaque'))
        {
            $companycheque = $request->file('cancel_chaque');
            $companychequeName = time().'.'.$companycheque->getClientOriginalExtension();
            $companycheque->move('uploads/cancel_cheque', $companychequeName);
            $res->cancel_cheque = $companychequeName;
        }
       $res->save();
       return back();

    }


    public function company_docs_update(Request $request)
    {
       $res =  Client::find($request->id);

       if($request->hasfile('company_gst'))
       {
            $companypan = $request->file('company_gst');
            $companypanName = time().'.'.$companypan->getClientOriginalExtension();
            $companypan->move('uploads/gst', $companypanName);
            $res->company_gst = $companypanName;
       }

        // pan card image
        if($request->hasfile('pan_card'))
        {
            $pan = $request->file('pan_card');
            $panName = time().'.'.$pan->getClientOriginalExtension();
            $pan->move('uploads/pan', $panName);
            $res->pan_card = $panName;
        }


        // address proof
        if($request->hasfile('address_proof'))
        {
            $addressproof = $request->file('address_proof');
            $addressproofName = time().'.'.$addressproof->getClientOriginalExtension();
            $addressproof->move('uploads/address_proof', $addressproofName);
            $res->address_proof = $addressproofName;
        }


        //  cancel cheque
        if($request->hasfile('cancel_chaque'))
        {
            $companycheque = $request->file('cancel_chaque');
            $companychequeName = time().'.'.$companycheque->getClientOriginalExtension();
            $companycheque->move('uploads/cancel_cheque', $companychequeName);
            $res->cancel_cheque = $companychequeName;
        }
       $res->save();
       return back();

    }


    public function delete_pins(Request $request)
    {
        $id = $request->pin_id;

        $delete = Uploaded_pin::find($id);
    }

    public function client_data_filter(Request $request)
    {

        $form = $request->from;
        $to = $request->to;
        $latest_oldest = $request->latest_oldest;
        $business_type = $request->business_type;
        $client_type = $request->client_type;

        $query = Client::query();

        if (!is_null($form) && !is_null($to)) {
            $query->whereBetween('created_at', [$form, $to]);
        }

        if (!is_null($business_type)) {
            $query->where('business_type', $business_type);
        }

        if (!is_null($client_type)) {
            $query->where('B2B', $client_type);
        }
        if (!is_null($latest_oldest)) {
            $query->orderBy('id', $latest_oldest);
        }

        $data = $query->get();

        return response()->json($data);

    }

    public function client_kyc_reject(Request $request)
    {
        Client::where('id', $request->client_id)
        ->update([
            'kyc_status' => 'Reject'
         ]);
         echo 'true';
    }


    public function client_kyc_approve(Request $request)
    {
        Client::where('id', $request->client_id)
        ->update([
            'kyc_status' => 'Approved'
         ]);
         echo 'true';
    }




}
