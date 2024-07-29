<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function NotFound(Request $request)
    {
        // Add any custom logic here if needed
        return view('frontend.errors.notfound');
    }
}
