<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CommentReport;
use Illuminate\Http\Request;

class CommentReportController extends Controller
{
    public function index() {
        $reports = $this->getAll();
        return view('backend.pages.comment_report',compact('reports'));
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
        return CommentReport::where('id', $id)->get();
    }

    public function getAll() {
        return CommentReport::all();
    }
}
