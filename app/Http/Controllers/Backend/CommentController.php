<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = $this->getAll();
        return view('backend.pages.comment',compact('comments'));
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
        return Comment::where('id', $id)->get();
    }

    public function getAll() {
        return Comment::all();
    }
}
