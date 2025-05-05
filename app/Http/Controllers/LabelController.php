<?php

namespace App\Http\Controllers;

use App\Models\Label_setting;
use App\Models\Lable_design;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function defualt(Request $request)
    {
        $data['data'] = Lable_design::where('id', "1")->first();
        return view('lable-designs', $data);
    }
    public function lable_setting(Request $request)
    {
        $data['data'] = Lable_design::where('id', "1")->first();
        return view('label-setting', $data);
    }
    public function edit_label(Request $request)
    {
        $data['data'] = Lable_design::where('id', '1')->first();
        $data['setting'] = Label_setting::where('design_id', $data['data']->id)->first();
        if ($data) {
            return view('edit-label-4x4', $data);
        } else {
            return back();
        }
    }
    public function edit_label2(Request $request)
    {
        $data['data'] = Lable_design::where('id', '2')->first();
        $data['setting'] = Label_setting::where('design_id', $data['data']->id)->first();
        if ($data) {
            return view('edit-label-4x6', $data);
        } else {
            return back();
        }
    }
    public function edit_label3(Request $request)
    {
        $data['data'] = Lable_design::where('id', '3')->first();
        $data['setting'] = Label_setting::where('design_id', $data['data']->id)->first();
        if ($data) {
            return view('edit-label-4x7', $data);
        } else {
            return back();
        }
    }
    public function edit_label4(Request $request)
    {
        $data['data'] = Lable_design::where('id', '4')->first();
        $data['setting'] = Label_setting::where('design_id', $data['data']->id)->first();
        if ($data) {
            return view('default', $data);
        } else {
            return back();
        }
    }
    // Section Activation
    public function active_sold_by(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['sold_by' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function active_shippeing(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['shipping_address' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function active_Product(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['product_section' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }


    public function active_declaration(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['declaration' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function active_return_address(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['return_address' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }


    public function active_consignee_mobile(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['consignee_mobile' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function active_display_logo(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;

            // Use the update method with a proper condition
            $update = Label_setting::where('design_id', $id)->update(['display_logo' => $status]);

            if ($update) {
                return response()->json(['success' => true, 'message' => 'Label setting updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update label setting']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    // end


}
