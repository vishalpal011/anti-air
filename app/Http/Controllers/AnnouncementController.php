<?php

namespace App\Http\Controllers;

use App\Models\Post_ad;
use App\Models\Video_ad_url;
use App\Models\Video_ads;
use Illuminate\Http\Request;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\Dimension;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function create_announcements(Request $request)
    {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->extension();
        $imagePath = 'assets/images';
        $file->move($imagePath, $imageName);

        $res = new Post_ad;
        $res->client_id = $request->client_id;
        $res->vendor_id = $request->vendor_id;
        $res->title = $request->title;
        $res->image = $imageName;
        $res->start_date = $request->start_date;
        $res->end_date = $request->end_date;
        $res->description = $request->description;
        $res->status = $request->status;
        $res->save();
        return response()->json(["status" => "success", "message" => "Post Created"]);
    }

    public function update_post(Request $request)
    {
        $res = Post_ad::find($request->id);
        $res->client_id = $request->client_id;
        $res->vendor_id = $request->vendor_id;
        $res->title = $request->title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $imagePath = 'assets/images';
            $file->move($imagePath, $imageName);
            $res->image = $imageName;
        }
        $res->start_date = $request->start_date;
        $res->end_date = $request->end_date;
        $res->description = $request->description;
        $res->status = $request->status;
        $res->save();
        return back();

    }

    public function delete_ad(Request $request)
    {
        $delete = Post_ad::where("id", $request->id)->delete();
        if($delete)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }



    // Video Ads

    public function create_video_ad(Request $request)
    {
         // Validate the uploaded video
         $validator = Validator::make($request->all(), [
            'video' => 'required|mimes:mp4,avi,mov,wmv|max:2048', // Max size in kilobytes (2 MB = 2048 KB)
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "error", "message" => "Video Max size 2 mb"]);
        }

        $file = $request->file('video');
        $imageName = time() . '.' . $file->extension();
        $imagePath = 'assets/videos';
        $file->move($imagePath, $imageName);

        $res = new Video_ads;

        $res->client_id = $request->client_id;
        $res->vendor_id = $request->vendor_id;
        $res->title = $request->title;
        $res->video = $imageName;
        $res->start_date = $request->start_date;
        $res->end_date = $request->end_date;
        $res->description = $request->description;
        $res->status = $request->status;
        $res->save();
        return response()->json(["status" => "success", "message" => "Post Created"]);
    }


    public function update_video_ad(Request $request)
    {

        if ($request->hasFile('video')) {
            $validator = Validator::make($request->all(), [
                'video' => 'required|mimes:mp4,avi,mov,wmv|max:2048',
            ]);

            if ($validator->fails()) {
                return back()->with('error','Video Max size 2 mb');
            }
            $res = Video_ads::find($request->id);
            $res->client_id = $request->client_id;
            $res->vendor_id = $request->vendor_id;
            $res->title = $request->title;
            $res->start_date = $request->start_date;
            $res->end_date = $request->end_date;
            $res->description = $request->description;
            $res->status = $request->status;

                $file = $request->file('video');
                $imageName = time() . '.' . $file->extension();
                $imagePath = 'assets/videos';
                $file->move($imagePath, $imageName);
                $res->video = $imageName;

            $res->save();
            return back();
        }
        else
        {
            $res = Video_ads::find($request->id);

            $res->client_id = $request->client_id;
            $res->vendor_id = $request->vendor_id;
            $res->title = $request->title;
            $res->start_date = $request->start_date;
            $res->end_date = $request->end_date;
            $res->description = $request->description;
            $res->status = $request->status;
            $res->save();
            return back();
        }
    }

    public function delete_video_ad(Request $request)
    {
        $delete = Video_ads::where("id", $request->id)->delete();
        if($delete)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }


    public function create_video_ad_url(Request $request)
    {

        $link = $request->link;
        $youtubeEmbedPattern = '/<iframe.*src="https:\/\/www\.youtube\.com\/embed\/([^"]+)".*<\/iframe>/i';
        if (preg_match($youtubeEmbedPattern, $link, $matches))
        {
            $youtubeVideoId = $matches[1];

            $res = new Video_ad_url;
            $res->client_id = $request->client_id;
            $res->vendor_id = $request->vendor_id;
            $res->title = $request->title;
            $res->start_date = $request->start_date;
            $res->end_date = $request->end_date;
            $res->link = str_replace(['width="560"', 'height="315"'], ['width="600"', 'height="400"'], $matches[0]);
            $res->description = $request->description;
            $res->status = $request->status;
            $res->save();
            return response()->json(["status" => "success", "message" => "Post Created"]);
        }
        else
        {
            return response()->json(["status" => "error", "message" => "Invailid Video URL"]);
        }

    }

    public function update_video_ad_url(Request $request)
    {
        if(!$request->link == null)
        {
            $link = $request->link;
            $youtubeEmbedPattern = '/<iframe.*src="https:\/\/www\.youtube\.com\/embed\/([^"]+)".*<\/iframe>/i';
            if (preg_match($youtubeEmbedPattern, $link, $matches))
            {
                $updateData = [
                    'client_id' => $request->client_id,
                    'vendor_id' => $request->vendor_id,
                    'title' => $request->title,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,
                    'link' => str_replace(['width="560"', 'height="315"'], ['width="600"', 'height="400"'], $matches[0]),

                    'status' => $request->status,
                ];

                Video_ad_url::where('id', $request->id)->update($updateData);
                return back();
            }
            else
            {
                return back()->with('error','Invailid Video URL');
            }

        }
        else
        {
            $updateData = [
                'client_id' => $request->client_id,
                'vendor_id' => $request->vendor_id,
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
                'status' => $request->status,
            ];

            Video_ad_url::where('id', $request->id)->update($updateData);
            return back();
        }

    }

    public function delete_video_ad_url(Request $request)
    {
        $delete = Video_ad_url::where("id", $request->id)->delete();
        if($delete)
        {
            echo "Data Delete Successfully";
        }
        else
        {
            echo "Error";
        }
    }

    public function announcements_data_filter(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Post_ad::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Post_ad::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Post_ad::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }

    public function videoads_data_filter(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Video_ads::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Video_ads::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Video_ads::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }

    public function videourl_data_filter(Request $request)
    {
       $form = $request->from;
       $to = $request->to;
       $latest_oldest = $request->latest_oldest;
       if($form == null || $to == null)
       {
            if(!$latest_oldest == null)
            {
                $getdata = Video_ad_url::orderBy('id',$latest_oldest)->get();
                return response()->JSON($getdata);
            }
       }
       else
       {
            if(!$latest_oldest == null)
            {
               $data = Video_ad_url::whereBetween('created_at', [$form, $to])->orderBy('id',$latest_oldest)->get();
               return response()->JSON($data);
            }
            else
            {
                $data = Video_ad_url::whereBetween('created_at', [$form, $to])->get();
                return response()->JSON($data);
            }
       }
    }
}
