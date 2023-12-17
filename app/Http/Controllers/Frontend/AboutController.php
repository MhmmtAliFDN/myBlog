<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return view('frontend.pages.about');
    }

    public function downloadcv() {
        $pdfPath = public_path('pdf/cv_muhammet_ali_fidan.pdf');
        return response()->download($pdfPath, 'cv_muhammet_ali_fidan.pdf');
    }
}
