<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RobotsTxtController extends Controller
{
    public function index()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /private/\n";
        $content .= "Disallow: /restricted/\n";
        $content .= "Disallow: /hidden/\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /login/\n";
        $content .= "Disallow: /logout/\n";
        $content .= "Disallow: /cart/\n";
        $content .= "Disallow: /checkout/\n";
        $content .= "Disallow: /contact/\n";
        $content .= "Disallow: /terms/\n";
        $content .= "Disallow: /privacy/\n";
        $content .= "Sitemap: https://fairworldproperties.com/sitemap.xml\n";  // Replace with your actual sitemap URL

        return response($content)->header('Content-Type', 'text/plain');
    }
}
