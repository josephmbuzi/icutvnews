<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = Page::pluck('url')->toArray();
    
        $sitemapContent = view('frontend.sitemap', [
            'urls' => $urls,
        ])->render();
    
        return response($sitemapContent)->header('Content-Type', 'xml');
    }
}
