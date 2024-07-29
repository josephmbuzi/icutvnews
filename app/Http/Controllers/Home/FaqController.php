<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FaqController extends Controller
{
    public function AllFaq() {
        $service_faq = ServiceFaq::latest()->get();
        return view('admin.service_faq.service_faq_all',compact('service_faq'));

    } // End Method

    public function AddFaq() {
        $service_faq = ServiceFaq::latest()->get();
        return view('admin.service_faq.service_faq_add',compact('service_faq'));

    } // End Method

    public function StoreFaq(Request $request){
        // $request->validate([
        //     'blog_category' => 'required',
        // ],[
        //     'blog_category.required' => 'Blog Category Name is Required',
        // ]);

            ServiceFaq::insert([
                'faq' => $request->faq,
                'faq_answer' => $request->faq_answer,
                'created_at' => Carbon::now()

            ]);
            $notification = array(
                'message' => 'FAQ Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.faq')->with($notification);
    } // End Method
    public function EditFaq($id){
        $service_faq = ServiceFaq::findOrFail($id);
        return view('admin.service_faq.service_faq_edit',compact('service_faq'));
    } // End Method

    public function UpdateFaq(Request $request){
        $faq_id = $request->id;
            ServiceFaq::findOrFail($faq_id)->update([
                'faq' => $request->faq,
                'faq_answer' => $request->faq_answer,

            ]);
            $notification = array(
                'message' => 'FAQ Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.faq')->with($notification);
    } // End Method

    public function DeleteFaq($id){

        ServiceFaq::findOrFail($id)->delete();

        $notification = array(
            'message' => 'FAQ Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
