<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightController extends Controller
{
     public function weight_and_EDD(Request $request)
     {
        return view('weights.index');
     }
}
