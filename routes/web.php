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



//-----------------------------Backend Routes-----------------------------//

Route::prefix('mafpanel')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('backend.dashboard.index');

    Route::get('/blog', [BlogController::class, 'index'])->name('backend.blog.index');

    Route::get('/contact', [ContactController::class, 'index'])->name('backend.contact.index');

    Route::get('/comment', [CommentController::class, 'index'])->name('backend.comment.index');

    Route::get('/comment-report', [CommentReportController::class, 'index'])->name('backend.commentreport.index');

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('backend.portfolio.index');

    Route::get('/blog-category', [BlogCategoryController::class, 'index'])->name('backend.blogcategory.index');

    Route::get('/portfolio-category', [PortfolioCategoryController::class, 'index'])->name('backend.portfoliocategory.index');

});

//-----------------------------/Backend Routes-----------------------------//



//-----------------------------Auth Routes-----------------------------//

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//-----------------------------/Auth Routes-----------------------------//

require __DIR__.'/auth.php';
