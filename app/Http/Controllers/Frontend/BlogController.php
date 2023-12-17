<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::where('status', 'Aktif')->get();
        $categories = BlogCategory::where('status', 'Aktif')->get();
        return view('frontend.pages.blog', compact('blogs','categories'));
    }
}
