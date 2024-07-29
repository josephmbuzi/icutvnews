<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Youtube;
use App\Services\SchemaService;
use Illuminate\Support\Carbon;
use Image;

class YoutubeController extends Controller
{
    public function AddYoutube(){
        $youtubes = Youtube::latest()->get();
        return view('admin.youtube.youtube_add');
    } // END METHOD

    public function StoreYoutube(Request $request){
        $request->validate([
            'youtube_image' => 'required',
            'link_title' => 'required',
            'link' => 'required',
        ]);
        $image = $request->file('youtube_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->save('upload/youtube/'.$name_gen);
        $save_url = 'upload/youtube/'.$name_gen;

        $youtube = Youtube::create([
            'link_title' => $request->link_title,
            'link' => $request->link,
            'youtube_image' => $save_url,
            'created_at' => Carbon::now()

        ]);

        return redirect()->route('all.youtube');
    } // END METHOD

    public function EditYoutube($id){
        $youtubes = Youtube::findOrFail($id);
        return view('admin.youtube.youtube_edit',compact('youtubes'));
    }

    public function UpdateYoutube(Request $request){
        $youtubes_id = $request->id;
        $request->validate([
            'youtube_image' => 'required',
            'link_title' => 'required',
            'link' => 'required',
        ]);

        $youtube = Youtube::findOrFail($youtube_id);

        if ($request->file('youtube_image')){
            $image = $request->file('youtube_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/youtube/'.$name_gen);
            $save_url = 'upload/youtube/'.$name_gen;

            $youtube->update([
            'link_title' => $request->link_title,
            'link' => $request->link,
            'youtube_image' => $save_url,
            'created_at' => Carbon::now()
            ]);
            $message = 'Youtube link Updated With Image Successfully';
        } else {
            $youtube->update ([
            'link_title' => $request->link_title,
            'link' => $request->link,
            'created_at' => Carbon::now()
            ]);
            $message = 'Youtube link Updated Without Image Successfully';
        }

    } // END METHOD

    public function DeleteYoutube($id){
        $youtubes = Youtube::findOrFail($id);
        $img = $youtubes->youtube_image;
        unlink($img);

        Youtube::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Youtube Link Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function AllYoutube(){
        $totalYoutubes = Youtube::count();
        $youtubes = Youtube::latest()->get();

        return view('admin.youtube.youtube_all',compact('youtubes','totalYoutubes'));
    }
}
