<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Contact(){
        
        return view('frontend.contact');
    } //End Method

    public function StoreMessage(Request $request){
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Message Sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    public function ContactMessage(){
        $totalMessages = Contact::count();
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contacts','totalMessages'));
    }//End Method

    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
