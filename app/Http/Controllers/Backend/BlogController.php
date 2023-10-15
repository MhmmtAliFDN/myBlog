<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = $this->getAll();
        return view('backend.pages.blog',compact('blogs'));
    }

    public function add(Request $request) {

    }

    public function delete(int $id) {

    }

    public function update(Request $request, int $id) {

    }

    public function statusUpdate(Request $request) {

    }

    public function get(int $id) {
        return Blog::where('id', $id)->get();
    }

    public function getAll() {
        return Blog::all();
    }
}
