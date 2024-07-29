<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    

    public function StoreSubscriber(Request $request){
        Subscriber::insert([
            
            'email' => $request->email,
            
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Subscribed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    public function SubscriberEmail(){
        $totalSubscribers = Subscriber::count();
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.allsubscribers', compact('subscribers','totalSubscribers'));
    }//End Method

    public function DeleteSubscriber($id){

        Subscriber::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
