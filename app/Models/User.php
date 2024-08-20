<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Home\UserController;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getProfileImageUrlAttribute()
    {
        return $this->profile_image ? asset($this->profile_image) : asset('upload/no_image.jpg');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecordUser()
    {
        return self::select('users.*')
        ->where('is_admin', '=', 0)
        ->where('is_delete', '=', 0)
        ->orderBy('users.id', 'desc')
        ->paginate(20);
    }
}
