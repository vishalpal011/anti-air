<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Courier;
use App\Models\MailConfiguration;
use App\Models\Pin_Code;
use App\Models\Post_ad;
use App\Models\Regions;
use App\Models\Sales_lead;
use App\Models\Service_Center;
use App\Models\State;
use App\Models\Uploaded_pin;
use App\Models\Video_ad_url;
use App\Models\Video_ads;
use App\Models\Zone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        if(session()->has('id'))
        {
            return view('index');
        }
        else
        {
            return view('auth.login');
        }
    }
    // AWB Management
    public function create_awb(Request $request)
    {
        $client = Client::all();
        return view('awb-stocks',compact('client'));
    }
    // Courier
    public function Courier(Request $request)
    {
        return view('Courier');
    }
    // Country
    public function Country(Request $request)
    {
        $data['data'] = Country::orderBy('id','DESC')->get();
        $data['active'] = Country::where('status','true')->count();
        $data['deactive'] = Country::where('status','false')->count();
        return view('Country',$data);
    }
    public function Regions(Request $request)
    {
        $data['data'] = Country::where('status','true')->orderBy('id','DESC')->get();
        $data['active'] = Regions::where('status','true')->count();
        $data['deactive'] = Regions::where('status','false')->count();
        $data['region'] = Regions::orderBy('id','DESC')->get();
        return view('Regions',$data);
    }
    public function State(Request $request)
    {
        $data['data'] = State::orderBy('id','DESC')->get();
        $data['active'] = State::where('status','true')->count();
        $data['deactive'] = State::where('status','false')->count();
        $data['region'] = Regions::where('status','true')->orderBy('id','DESC')->get();
       
        return view('State',$data);
    }
    // City
    public function City(Request $request)
    {
        $data['data'] = City::orderBy('id','DESC')->paginate(10);
        $data['active'] = City::where('status','true')->count();
        $data['deactive'] = City::where('status','false')->count();
        $data['region'] = State::where('status','true')->get();
        return view('City',$data);
    }
    // Service Center
    public function service_center(Request $request)
    {
        $data['data'] = Service_Center::orderBy('id','DESC')->get();
        $data['active'] = Service_Center::where('status','true')->count();
        $data['deactive'] = Service_Center::where('status','false')->count();
        $data['city'] = City::all();
        return view('Service-Center',$data);
    }

    // Pin code  (Location and  Regions)
    public function pin_code(Request $request)
    {
        $data['data'] = Pin_Code::orderBy('id','DESC')->paginate(10);
        $data['active'] = Pin_Code::where('status','true')->count();
        $data['deactive'] = Pin_Code::where('status','false')->count();
        $data['city'] = City::where('status','true')->get();
        return view('Pin-Code',$data);
    }
    // Zone
    public function zone(Request $request)
    {
        $data['data'] = Zone::orderBy('id','DESC')->get();
        $data['active'] = Zone::where('status','true')->count();
        $data['deactive'] = Zone::where('status','false')->count();
        // $data['pincode'] = Pin_Code::where('status','true')->orderBy('id','DESC')->get();
        return view('Zone',$data);
    }
    // client
    public function client(Request $request)
    {
        return view('client');
    }

    public function Sales(Request $request)
    {
        $data['data'] = Sales_lead::all();
        $data['region'] = Sales_lead::all();
        $data['active'] = Sales_lead::where('status','true')->count();
        $data['deactive'] = Sales_lead::where('status','false')->count();
        return view('Sales',$data);
    }




    // Announcements
    public function Announcements(Request $request)
    {
        $data['client'] = Client::where('status','true')->get();
        $data['courier'] = Courier::where('status','true')->get();
        $data['data'] = Post_ad::with('client','courier')->get();
        $data['region'] = Sales_lead::all();
        $data['active'] = Post_ad::where('status','true')->count();
        $data['deactive'] = Post_ad::where('status','false')->count();
         return view('Announcements',$data);
    }

    // Video Ad
    public function video_ad(Request $request)
    {
        $data['client'] = Client::where('status','true')->get();
        $data['courier'] = Courier::where('status','true')->get();
        $data['data'] = Video_ads::with('client','courier')->get();
        $data['region'] = Video_ads::all();
        $data['active'] = Video_ads::where('status','true')->count();
        $data['deactive'] = Video_ads::where('status','false')->count();
         return view('video-ads',$data);
    }

    // Video Ad Url

    public function video_ad_url(Request $request)
    {
        $data['client'] = Client::where('status','true')->get();
        $data['courier'] = Courier::where('status','true')->get();
        $data['data'] = Video_ad_url::with('client','courier')->get();
        $data['region'] = Video_ad_url::all();
        $data['active'] = Video_ad_url::where('status','true')->count();
        $data['deactive'] = Video_ad_url::where('status','false')->count();
        return view('video-ads-url',$data);
    }

    // upload pin code

    public function upload_pin_code(Request $request)
    {
        $data['data'] = Uploaded_pin::with('clients','couriers')->get();
        $data['courier'] = Courier::orderBy('id','DESC')->get();
        $data['client'] = Client::orderBy('id','DESC')->get();
        $data['total_serviceable_pin'] = Uploaded_pin::select('pincode')->count();

         return view('upload-pin-Code',$data);
    }


    // warehouse

    public function warehouse(Request $request)
    {
       $data['client'] = Client::where('status','true')->get();
       return view('warehouse',$data);
    }

    // Booking

    public function booking(Request $request)
    {
        $data['client'] = Client::where('status','true')->get();
        $data['courier'] = Courier::where('status','true')->get();

        return view('booking',$data);
    }

    public function view_booking(Request $request)
    {

        return view('view-booking');
    }



    // SMTP Mails Config
    public function email_settings(Request $request)
    {
        $data['data'] = MailConfiguration::first();
        return view('email-setting',$data);
    }

    public function update_mail_config(Request $request)
    {
        $validatedData = [
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
            'from_name' => $request->from_name,
        ];

        // Check if a configuration already exists
        $config = MailConfiguration::first();

        if ($config) {
            // Update existing configuration
            $config->update($validatedData);
              return response()->json(['status'=>'success', 'message'=>'Mail Config Saved']);
        } else {
            // Create new configuration
            MailConfiguration::create($validatedData);
            return response()->json(['status'=>'success', 'message'=>'Mail Config Updated']);
        }
    }


    public function logout(Request $request)
    {
        session()->flush(); // Clear all session data
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token

            Auth::logout(); // Log the user out

            return redirect('/');

    }

    // AWB couriers

    public function create_awb_couriers(Request $request)
    {
        $client = Courier::all();
        return view('awb-stocks-couriers', compact('client'));

    }


}
