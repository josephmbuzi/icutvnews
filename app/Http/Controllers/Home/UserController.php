<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Auth;

class UserController extends Controller
{
    public function users()
    {
        $data['getRecord'] = User::getRecordUser();
        return view('admin.user.all');
    }
}
