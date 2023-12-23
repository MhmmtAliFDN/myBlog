<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'Aktif')
        ->with('user')
        ->select('name', 'user_id', 'image', 'created_at')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $portfolios = Portfolio::where('status', 'Aktif')
        ->select('id', 'name')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        return view('frontend.pages.home', compact('blogs', 'portfolios'));
    }
}
