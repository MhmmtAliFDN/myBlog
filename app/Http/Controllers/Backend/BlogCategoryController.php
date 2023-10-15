<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index() {
        $blogCategories = $this->getAll();
        return view('backend.pages.blog_category',compact('blogCategories'));
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
        return BlogCategory::where('id', $id)->get();
    }

    public function getAll() {
        return BlogCategory::all();
    }
}
