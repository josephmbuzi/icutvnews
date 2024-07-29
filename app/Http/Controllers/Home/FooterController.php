<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Image;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function FooterSetup(){
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all',compact('allfooter'));
    } //End Mothod

    public function UpdateFooter(Request $request){

        $footer_id = $request->id;

        if ($request->file('footer_logo')) {
            $image = $request->file('footer_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/footer/'.$name_gen);
            $save_url = 'upload/footer/'.$name_gen;

            Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'address' => $request->address,
                'short_description' => $request->short_description,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'behance' => $request->behance,
                'youtube' => $request->youtube,
                'copyright' => $request->copyright,
                'footer_logo' => $save_url,

            ]);
            $notification = array(
                'message' => 'Footer Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else{
            Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'address' => $request->address,
                'short_description' => $request->short_description,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'behance' => $request->behance,
                'youtube' => $request->youtube,
                'copyright' => $request->copyright,
            ]);
            $notification = array(
                'message' => 'Footer Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } //end else
    } // End Method
}
