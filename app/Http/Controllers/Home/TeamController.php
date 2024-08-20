<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use App\Models\User;

class TeamController extends Controller
{
    public function AllTeam(){
        $teams = Team::latest()->get();
        return view('admin.team.team_all',compact('teams'));
    } //End Method

    public function AddTeam(){
        $users = User::all(); // Fetch all users
        $teams = Team::latest()->get();
        return view('admin.team.team_add', compact('users', 'teams'));
    } //End Method

    public function StoreTeam(Request $request){
        $request->validate([
            'team_name' => 'required',
            'team_position' => 'required',
            'team_image' => 'required',
        ],[
            'team_name.required' => 'Member Name is Required',
            'team_position.required' => 'Member Position is Required',
        ]);

        $image = $request->file('team_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->save('upload/team/'.$name_gen);
        $save_url = 'upload/team/'.$name_gen;

        Team::insert([
            'team_name' => $request->team_name,
            'team_position' => $request->team_position,
            'team_desc' => $request->team_desc,
            'team_skills' => $request->team_skills,
            'team_guide' => $request->team_guide,
            'team_exp' => $request->team_exp,
            'team_fb' => $request->team_fb,
            'team_twitter' => $request->team_twitter,
            'team_linkedin' => $request->team_linkedin,
            'team_image' => $save_url,
            'created_at' => Carbon::now()

        ]);
        $notification = array(
            'message' => 'Team Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    } //End Method

    public function EditTeam($id){
        $users = User::all(); // Fetch all users
        $teams = Team::findOrFail($id);
        return view('admin.team.team_edit',compact('teams'));
    } //End Method

    public function UpdateTeam(Request $request){
        $teams_id = $request->id;

        if ($request->file('team_image')) {
            $image = $request->file('team_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->save('upload/team/'.$name_gen);
            $save_url = 'upload/team/'.$name_gen;



            Team::findOrFail($teams_id)->update([
                'team_name' => $request->team_name,
                'team_position' => $request->team_position,
                'team_desc' => $request->team_desc,
                'team_skills' => $request->team_skills,
                'team_guide' => $request->team_guide,
                'team_exp' => $request->team_exp,
                'team_fb' => $request->team_fb,
                'team_twitter' => $request->team_twitter,
                'team_linkedin' => $request->team_linkedin,
                'team_image' => $save_url,
                'created_at' => Carbon::now()

            ]);
            $notification = array(
                'message' => 'Team Member Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        } else{
            Team::findOrFail($teams_id)->update([
                'team_name' => $request->team_name,
                'team_position' => $request->team_position,
                'team_desc' => $request->team_desc,
                'team_skills' => $request->team_skills,
                'team_guide' => $request->team_guide,
                'team_exp' => $request->team_exp,
                'team_fb' => $request->team_fb,
                'team_twitter' => $request->team_twitter,
                'team_linkedin' => $request->team_linkedin,

            ]);
            $notification = array(
                'message' => 'Team Member Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        }
    }

    public function DeleteTeam($id){
        $teams = Team::findOrFail($id);
        $img = $teams->team_image;
        unlink($img);

        Team::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Member Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function TeamDetails($id) {
        $teams = Team::findOrFail($id);

        return view('frontend.team_details',compact('teams'));
    }//End Method
}
