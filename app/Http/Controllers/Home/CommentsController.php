<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentsController extends Controller
{
   
    public function index() // Method name should be lowercase 'index'
    {
        
        $approvedComments = Comments::where('comment_approved', true)->get(); // Use 'comment_approved'
        
        return view('frontend.index', compact('approvedComments'));
    }

    public function approvedComment()
    {
        $totalComments = Comments::count();
        $approvedComments = Comments::where('comment_approved', true)->get();
        return view('admin.comment.approved_comment', compact('approvedComments','totalComments'));
    }

    public function storeComment(Request $request) // Method name should be lowercase 'storeComment'
    {
        $this->validate($request, [
            'comment' => 'required|max:255',
        ]);

        

        // Store the comment in the database
        Comments::insert([
            'commenter_name' => $request->input('commenter_name'),
            'commenter_email' => $request->input('commenter_email'),
            'commenter_website' => $request->input('commenter_website'),
            'comment' => $request->input('comment'),
            'comment_approved' => false, // No need to use $request here
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Comment submitted.');
    }

    public function unapprovedComment() // Method name should be lowercase 'unapprovedComment'
    {
        $unapprovedComments = Comments::where('comment_approved', false)->latest()->get(); // Use 'comment_approved'
        $unapprovedCommentCount = $unapprovedComments->count();
        return view('admin.comment.approve_comment', compact('unapprovedComments','unapprovedCommentCount'));
    }

    public function approveComment($id) // Method name should be lowercase 'approveComment'
    {
        $comment = Comments::findOrFail($id);
        $comment->comment_approved = true;
        $comment->save();

        return redirect()->back()->with('success', 'Comment approved.');
    }
}

