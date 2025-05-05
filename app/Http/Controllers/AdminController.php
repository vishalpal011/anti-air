<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminPasswordreset;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function admin_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Admin::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('id', $user->id);
            $request->session()->flash('success_message', 'Hey There! Welcome to the dashboard.');
            return back();
        } else {
            $request->session()->flash('errormsg', 'Invalid credentials. Please try again.');
            return back();
        }

    }


    // forgot password
    public function forgot_pass(Request $request)
    {
        return view('auth.forgot');
    }

    public function send_otp(Request $request)
    {
        $check = Admin::where('email', $request->email)->count();

        if ($check) {
            $otp = mt_rand(1000, 9999);
            Admin::where('email', $request->email)->update(['otp' => $otp]);

            // Debugging statements
            // dd('OTP updated');

            // $data = ['otp' => $otp, 'email' => $request->email];
            // Mail::to($request->email)->send(new AdminPasswordreset($data));

            // Debugging statements
            // dd('Mail sent');

            return 1;
        } else {
            return 0;
        }
    }


}
