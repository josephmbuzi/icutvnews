<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }

    public function comments(){
        return $this->belongsTo(Comments::class,'comment_id','id');
    }



    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the one-to-one relationship with EditorChoice model
    public function editorChoice()
    {
        return $this->hasOne(EditorChoice::class);
    }



    // Define the one-to-one relationship with PopularBlog model
    public function popularBlog()
    {
        return $this->hasOne(PopularBlog::class);
    }


}
