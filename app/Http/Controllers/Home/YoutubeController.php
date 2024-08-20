<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Youtube;
use Illuminate\Support\Carbon;
use Image;

class YoutubeController extends Controller
{
    public function AddYoutube(){
        return view('admin.youtube.youtube_add');
    }

    public function StoreYoutube(Request $request){
        $request->validate([
            'youtube_image' => 'required|image',
            'link_title' => 'required|string|max:255',
            'link' => 'required',
        ]);

        $image = $request->file('youtube_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/youtube/'.$name_gen);
        $save_url = 'upload/youtube/'.$name_gen;

        Youtube::create([
            'link_title' => $request->link_title,
            'link' => $request->link,
            'youtube_image' => $save_url,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('all.youtube')->with('success', 'YouTube link added successfully');
    }

    public function EditYoutube($id){
        $youtubes = Youtube::findOrFail($id);
        return view('admin.youtube.youtube_edit', compact('youtubes'));
    }

    public function UpdateYoutube(Request $request, $id){
        $youtube = Youtube::findOrFail($id);

        $request->validate([
            'link_title' => 'required|string|max:255',
            'link' => 'required',
            'youtube_image' => 'nullable|image',
        ]);

        $data = [
            'link_title' => $request->link_title,
            'link' => $request->link,
            'updated_at' => Carbon::now()
        ];

        if ($request->file('youtube_image')) {
            // Delete the old image
            if (file_exists($youtube->youtube_image)) {
                unlink($youtube->youtube_image);
            }

            // Save the new image
            $image = $request->file('youtube_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/youtube/'.$name_gen);
            $data['youtube_image'] = 'upload/youtube/'.$name_gen;
        }

        $youtube->update($data);

        return redirect()->route('all.youtube')->with('success', 'YouTube link updated successfully');
    }

    public function DeleteYoutube($id){
        $youtube = Youtube::findOrFail($id);

        // Delete the image
        if (file_exists($youtube->youtube_image)) {
            unlink($youtube->youtube_image);
        }

        $youtube->delete();

        return redirect()->back()->with('success', 'YouTube link deleted successfully');
    }

    public function AllYoutube(){
        $youtubes = Youtube::latest()->get();
        return view('admin.youtube.youtube_all', compact('youtubes'));
    }
}
