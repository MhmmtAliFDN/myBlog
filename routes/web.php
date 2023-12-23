<?php

use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\CommentReportController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PortfolioCategoryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//fotoğraflar için file manager h3k, laravel file manager(unisharp),jquery loading page percentage, okuma süresi



//-----------------------------Frontend Routes-----------------------------//

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');

Route::get('/calismalarim', [FrontendPortfolioController::class, 'index'])->name('frontend.portfolio.index');
Route::get('/calismalarim/{categorySlug}', [FrontendPortfolioController::class, 'getByCategory'])->name('frontend.portfolio.getbycategory');
Route::get('/calismalarim/{categorySlug}/{portfolioSlug}', [FrontendPortfolioController::class, 'getSinglePortfolio'])->name('frontend.portfolio.getsingleportfolio');

Route::get('/blog', [FrontendBlogController::class, 'index'])->name('frontend.blog.index');
Route::get('/blog/{categorySlug}', [FrontendBlogController::class, 'getByCategory'])->name('frontend.blog.getbycategory');
Route::get('/blog/{categorySlug}/{blogSlug}', [FrontendBlogController::class, 'getSinglePost'])->name('frontend.blog.getsinglepost');


Route::get('/hakkimda', [AboutController::class, 'index'])->name('frontend.about.index');
Route::get('/hakkimda/ozgecmis-indir', [AboutController::class, 'downloadcv'])->name('frontend.about.downloadcv');
Route::get('/iletisim', [FrontendContactController::class, 'index'])->name('frontend.contact.index');
Route::post('/iletisim/ekle', [FrontendContactController::class, 'add'])->name('frontend.contact.add');

//-----------------------------Frontend Routes-----------------------------//



//-----------------------------Backend Routes-----------------------------//

Route::prefix('mafpanel')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard.index');

    Route::get('/iletisim', [ContactController::class, 'index'])->name('backend.contact.index');
    Route::get('/iletisim/getir', [ContactController::class, 'get'])->name('backend.contact.get');
    Route::post('/iletisim/ekle', [ContactController::class, 'add'])->name('backend.contact.add');
    Route::post('/iletisim/sil', [ContactController::class, 'delete'])->name('backend.contact.delete');
    Route::post('/iletisim/coklu-sil', [ContactController::class, 'deleteMultiple'])->name('backend.contact.deleteMultiple');
    Route::post('/iletisim/guncelle', [ContactController::class, 'update'])->name('backend.contact.update');
    Route::post('/iletisim/durum-guncelle', [ContactController::class, 'statusUpdate'])->name('backend.contact.statusUpdate');

    Route::get('/blog', [BlogController::class, 'index'])->name('backend.blog.index');
    Route::get('/blog/getir', [BlogController::class, 'get'])->name('backend.blog.get');
    Route::post('/blog/ekle', [BlogController::class, 'add'])->name('backend.blog.add');
    Route::post('/blog/sil', [BlogController::class, 'delete'])->name('backend.blog.delete');
    Route::post('/blog/coklu-sil', [BlogController::class, 'deleteMultiple'])->name('backend.blog.deleteMultiple');
    Route::post('/blog/guncelle', [BlogController::class, 'update'])->name('backend.blog.update');
    Route::post('/blog/durum-guncelle', [BlogController::class, 'statusUpdate'])->name('backend.blog.statusUpdate');

    Route::get('/blog-kategori', [BlogCategoryController::class, 'index'])->name('backend.blogcategory.index');
    Route::get('/blog-kategori/getir', [BlogCategoryController::class, 'get'])->name('backend.blogcategory.get');
    Route::post('/blog-kategori/ekle', [BlogCategoryController::class, 'add'])->name('backend.blogcategory.add');
    Route::post('/blog-kategori/sil', [BlogCategoryController::class, 'delete'])->name('backend.blogcategory.delete');
    Route::post('/blog-kategori/coklu-sil', [BlogCategoryController::class, 'deleteMultiple'])->name('backend.blogcategory.deleteMultiple');
    Route::post('/blog-kategori/guncelle', [BlogCategoryController::class, 'update'])->name('backend.blogcategory.update');
    Route::post('/blog-kategori/durum-guncelle', [BlogCategoryController::class, 'statusUpdate'])->name('backend.blogcategory.statusUpdate');

    Route::get('/yorum', [CommentController::class, 'index'])->name('backend.comment.index');
    // Route::get('/yorum/getir', [CommentController::class, 'get'])->name('backend.comment.get');
    // Route::post('/yorum/ekle', [commentController::class, 'add'])->name('backend.comment.add');
    // Route::post('/yorum/sil', [commentController::class, 'delete'])->name('backend.comment.delete');
    // Route::post('/yorum/coklu-sil', [commentController::class, 'deleteMultiple'])->name('backend.comment.deleteMultiple');
    // Route::post('/yorum/guncelle', [commentController::class, 'update'])->name('backend.comment.update');
    // Route::post('/yorum/durum-guncelle', [commentController::class, 'statusUpdate'])->name('backend.comment.statusUpdate');

    Route::get('/comment-report', [CommentReportController::class, 'index'])->name('backend.commentreport.index');

    Route::get('/calismalarim', [PortfolioController::class, 'index'])->name('backend.portfolio.index');
    Route::get('/calismalarim/getir', [PortfolioController::class, 'get'])->name('backend.portfolio.get');
    Route::post('/calismalarim/ekle', [PortfolioController::class, 'add'])->name('backend.portfolio.add');
    Route::post('/calismalarim/sil', [PortfolioController::class, 'delete'])->name('backend.portfolio.delete');
    Route::post('/calismalarim/coklu-sil', [PortfolioController::class, 'deleteMultiple'])->name('backend.portfolio.deleteMultiple');
    Route::post('/calismalarim/guncelle', [PortfolioController::class, 'update'])->name('backend.portfolio.update');
    Route::post('/calismalarim/durum-guncelle', [PortfolioController::class, 'statusUpdate'])->name('backend.portfolio.statusUpdate');

    Route::get('/calismalarim-kategori', [PortfolioCategoryController::class, 'index'])->name('backend.portfoliocategory.index');
    Route::get('/calismalarim-kategori/getir', [PortfolioCategoryController::class, 'get'])->name('backend.portfoliocategory.get');
    Route::post('/calismalarim-kategori/ekle', [PortfolioCategoryController::class, 'add'])->name('backend.portfoliocategory.add');
    Route::post('/calismalarim-kategori/sil', [PortfolioCategoryController::class, 'delete'])->name('backend.portfoliocategory.delete');
    Route::post('/calismalarim-kategori/coklu-sil', [PortfolioCategoryController::class, 'deleteMultiple'])->name('backend.portfoliocategory.deleteMultiple');
    Route::post('/calismalarim-kategori/guncelle', [PortfolioCategoryController::class, 'update'])->name('backend.portfoliocategory.update');
    Route::post('/calismalarim-kategori/durum-guncelle', [PortfolioCategoryController::class, 'statusUpdate'])->name('backend.portfoliocategory.statusUpdate');
});

//-----------------------------/backend routes-----------------------------//



//-----------------------------Auth Routes-----------------------------//

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//-----------------------------/auth routes-----------------------------//

require __DIR__ . '/auth.php';
