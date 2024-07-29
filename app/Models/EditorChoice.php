<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditorChoice extends Model
{
    use HasFactory;
    protected $guarded = [];

     // Define the relationship with the Blog model
     public function blog()
     {
         return $this->belongsTo(Blog::class);
     }
}
