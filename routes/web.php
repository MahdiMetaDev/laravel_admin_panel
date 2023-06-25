<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

//Route::redirect('/', '/user');

//Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
//    Route::get('/', [HomeController::class, 'index'])->name('home.index');
//    Route::get('/products', [WebProductController::class, 'index'])->name('product.index');
//    Route::get('/blogs', [WebBlogController::class, 'index'])->name('blog.index');
//});

Route::fallback(function () {
    return Redirect::route('admin.dashboard.index');
});
