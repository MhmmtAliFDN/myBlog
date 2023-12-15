<?php

use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\CommentReportController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PortfolioCategoryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//fotoğraflar için file manager h3k, laravel file manager(unisharp),jquery loading page percentage, okuma süresi

//-----------------------------Backend Routes-----------------------------//

Route::prefix('mafpanel')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard.index');

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
    Route::post('/blog-kategori/guncelle', [BlogCategoryController::class, 'update'])->name('backend.blogcategory.update');
    Route::post('/blog-kategori/durum-guncelle', [BlogCategoryController::class, 'statusUpdate'])->name('backend.blogcategory.statusUpdate');


    Route::get('/iletisim', [ContactController::class, 'index'])->name('backend.contact.index');
    Route::get('/iletisim/getir', [ContactController::class, 'get'])->name('backend.contact.get');
    Route::post('/iletisim/ekle', [ContactController::class, 'add'])->name('backend.contact.add');
    Route::post('/iletisim/sil', [ContactController::class, 'delete'])->name('backend.contact.delete');
    Route::post('/iletisim/guncelle', [ContactController::class, 'update'])->name('backend.contact.update');
    Route::post('/iletisim/durum-guncelle', [ContactController::class, 'statusUpdate'])->name('backend.contact.statusUpdate');

    Route::get('/comment', [CommentController::class, 'index'])->name('backend.comment.index');

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
