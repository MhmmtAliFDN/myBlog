<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() {
        $portfolios = Portfolio::where('status', 'Aktif')->get();
        $categories = PortfolioCategory::where('status', 'Aktif')->get();
        return view('frontend.pages.porfolio', compact($portfolios, $categories));
    }
}
