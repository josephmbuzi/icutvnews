<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function users()
    {
        $data['getRecord'] = User::getRecordUser();
        return view('admin.user.all', $data);
    }
    public function addUsers(Request $request){
        return view('admin.user.add');
    }
    public function insertUsers(Request $request){
        // $request->validate([
        //     'username' => 'required|string|max:255|unique:users,username',
        //     'email' => 'required|string|email|max:255|unique:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        // ], [
        //     'username.unique' => 'The username has already been taken.',
        //     'email.unique' => 'The email has already been taken.',
        // ]);
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->username = trim($request->username);
        $save->password = Hash::make($request->password);
        $save->save();
        session()->flash('success', 'Record added successfully!');
        return view('admin.user.add');
    }
    public function editUsers($id){
        $data['getRecord'] = User::getSingle($id);
        return view('admin.user.edit', $data);
    } 
    public function updateUsers($id, Request $request){
        $save = User::getSingle($id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->username = trim($request->username);
        $save->password = Hash::make($request->password);
        $save->save();
        session()->flash('success', 'Record updated successfully!');
        return view('admin.user.edit');
    }

    public function deleteUser($id){

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
