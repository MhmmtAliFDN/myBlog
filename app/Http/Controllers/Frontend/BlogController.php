<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogQuery = Blog::query();
        $categoryQuery = BlogCategory::query();

        $activeBlogs = $blogQuery->where('status', 'Aktif')
            ->whereHas('category', function ($query) {
                $query->where('status', 'Aktif');
            })
            ->whereHas('user', function ($query) {
                $query->where('status', 'Aktif');
            });

        $blogs = $activeBlogs->paginate(6);
        $categories = $categoryQuery->where('status', 'Aktif')->get();
        $popularBlogs = $activeBlogs->orderBy('view', 'desc')->take(3)->get();

        return view('frontend.pages.blog', compact('blogs', 'categories', 'popularBlogs'));
    }

    public function getByCategory(Request $request): View
    {
        $blogQuery = Blog::query();
        $categoryQuery = BlogCategory::query();

        if ($request->categorySlug) {
            $blogs = $blogQuery->where('status', 'Aktif')
                ->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('status', 'Aktif')->where('slug', $request->categorySlug);
                })
                ->whereHas('user', function ($userQuery) {
                    $userQuery->where('status', 'Aktif');
                })
                ->paginate(6);
        }

        $categories = $categoryQuery->where('status', 'Aktif')->get();
        $popularBlogs = $blogQuery->orderBy('view', 'desc')->take(3)->get();

        return view('frontend.pages.blog', compact('blogs', 'categories', 'popularBlogs'));
    }

    public function getByUser(): View
    {
        return view();
    }

    public function getSinglePost(Request $request): View
    {
        $blogQuery = Blog::query();
        $categoryQuery = BlogCategory::query();

        if ($request->categorySlug) {
            $blogs = $blogQuery->where('status', 'Aktif')
                ->whereHas('category', function ($categoryQuery) use ($request) {
                    $categoryQuery->where('status', 'Aktif')->where('slug', $request->categorySlug);
                })
                ->whereHas('user', function ($userQuery) {
                    $userQuery->where('status', 'Aktif');
                })
                ->paginate(6);
        }

        $categories = $categoryQuery->where('status', 'Aktif')->get();
        $popularBlogs = $blogQuery->orderBy('view', 'desc')->take(3)->get();

        $blogSlug = $request->blogSlug;
        $categorySlug = $request->categorySlug;

        $blog = $blogQuery->where('slug', $blogSlug)->with('category', 'user', 'comments')->first();

        $createdAt = $blog->created_at;
        $day = $createdAt->format('d');
        $month = $createdAt->format('m');
        $monthName = $createdAt->translatedFormat('M');
        $year = $createdAt->format('Y');

        return view('frontend.pages.blog-single', compact('blog', 'day', 'monthName', 'blogs', 'popularBlogs', 'categories'));
    }

    // public function getByFilter(Request $request): View
    // {
    //     $filter = $request->ara;

    //     $blogQuery = Blog::query();
    //     $categoryQuery = BlogCategory::query();

    //     $activeBlogs = $blogQuery->where('status', 'Aktif')
    //         ->whereHas('category', function ($query) {
    //             $query->where('status', 'Aktif');
    //         })
    //         ->whereHas('user', function ($query) {
    //             $query->where('status', 'active');
    //         });

    //     $filteredBlogs = $activeBlogs->where(function($activeBlogs) use ($filter) {
    //         $activeBlogs->where('name', 'like', "%$filter%")
    //             ->orWhere('content', 'like', "%$filter%");

    //         })
    //         ->orWhereHas('category', function($activeBlogs) use ($filter) {
    //             $activeBlogs->where('name', 'like', "%$filter%");
    //         })
    //         ->orWhereHas('user', function($activeBlogs) use ($filter) {
    //             $activeBlogs->where('name', 'like', "%$filter%");
    //         })->get();

    //     $blogs = $filteredBlogs->paginate(6);
    //     $categories = $categoryQuery->where('status', 'Aktif')->get();
    //     $popularBlogs = $activeBlogs->orderBy('view', 'desc')->take(3)->get();

    //     return view('frontend.pages.blog', compact('blogs', 'categories', 'popularBlogs'));
    // }

}
