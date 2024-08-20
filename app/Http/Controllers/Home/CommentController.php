<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $blogId)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'comment' => 'required|string',
    ]);

    Comment::create([
        'blog_id' => $blogId,
        'name' => $request->name,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Comment posted successfully!');
}

}
