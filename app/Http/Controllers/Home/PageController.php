<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function AllPages(){
        $pages = Page::latest()->get();
        return view('admin.page.pages_all',compact('pages'));
    } //End Mothod

    public function AddPages(){
        $pages = Page::latest()->get();
        return view('admin.page.pages_add',compact('pages'));
    } //End Mothod

    public function StorePage(Request $request){
        $request->validate([
            'url' => 'required',
        ],[
            'url.required' => 'Page URL is Required',
        ]);

        

        Page::insert([
            'url' => $request->url,
            
            'created_at' => Carbon::now()

        ]); 
        $notification = array(
            'message' => 'Page Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);
    } //End Mothod

    public function EditPage($id){
        $pages = Page::findOrFail($id);
        return view('admin.page.page_edit',compact('pages'));
    } //End Mothod

    public function UpdatePage(Request $request){
        $pages_id = $request->id;

        Page::findOrFail($pages_id)->update([
            'url' => $request->url,
            'created_at' => Carbon::now()

        ]); 
        $notification = array(
            'message' => 'Page Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);

       
    } //End Mothod

    public function DeletePage($id){
        

        Page::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Page Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pages')->with($notification);
    } // End Method
}
