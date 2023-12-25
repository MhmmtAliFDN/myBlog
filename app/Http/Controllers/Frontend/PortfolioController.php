<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(): View {
        $portfolioQuery = Portfolio::query();
        $categoryQuery = PortfolioCategory::query();

        $activePortfolios = $portfolioQuery->where('status', 'Aktif')
        ->whereHas('category', function ($query) {
            $query->where('status', 'Aktif');
        })
        ->whereHas('user', function ($query) {
            $query->where('status', 'Aktif');
        });

        $portfolios = $activePortfolios->get();
        $categories = $categoryQuery->where('status', 'Aktif')->get();

        return view('frontend.pages.portfolio', compact('portfolios', 'categories'));
    }

    public function getSinglePortfolio(Request $request): View {
        $portfolioQuery = Portfolio::query();
        $categoryQuery = PortfolioCategory::query();

        if ($request->categorySlug) {
            $portfolios = $portfolioQuery->where('status', 'Aktif')
                ->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('status', 'Aktif')->where('slug', $request->categorySlug);
                })
                ->whereHas('user', function ($userQuery) {
                    $userQuery->where('status', 'Aktif');
                })
                ->get();
        }

        $categorySlug = $request->categorySlug;
        $portfolioSlug = $request->portfolioSlug;

        $categories = $categoryQuery->where('status', 'Aktif')->get();
        $portfolio = $portfolioQuery->where('slug', $portfolioSlug)->with('category', 'user')->first();

        $createdAt = $portfolio->created_at;
        $monthName = $createdAt->translatedFormat('F');
        $year = $createdAt->format('Y');

        $currentPageUrl = $request->fullUrl();

        return view('frontend.pages.portfolio-single', compact('portfolios', 'categories', 'portfolio', 'monthName', 'year', 'currentPageUrl'));
    }

    public function sharePortfolio(Request $request)
    {
        $currentPageUrl = $request->fullUrl();
        return $currentPageUrl;
    }
}
