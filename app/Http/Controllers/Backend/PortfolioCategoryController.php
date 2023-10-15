<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    public function index() {
        $portfolioCategories = $this->getAll();
        return view('backend.pages.portfolio_category',compact('portfolioCategories'));
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
        return PortfolioCategory::where('id', $id)->get();
    }

    public function getAll() {
        return PortfolioCategory::all();
    }
}
