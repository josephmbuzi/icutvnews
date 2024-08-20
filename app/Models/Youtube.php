<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the relationship with the User model
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}