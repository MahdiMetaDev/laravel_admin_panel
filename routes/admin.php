<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('image', [ImageController::class, 'index'])->name('image.index');
Route::patch('comment/{comment}/statusUpdate', [CommentController::class, 'statusUpdate'])->name('comment.statusUpdate');
Route::resource('user', UserController::class);
Route::resource('blog', BlogController::class);
Route::resource('product', ProductController::class);
Route::resource('brand', BrandController::class);
Route::resource('category', CategoryController::class);
Route::resource('comment', CommentController::class);

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog/{blog}/like', 'blog_likes')->name('blog.like');
    Route::get('/blog/{blog}/dislike', 'blog_dislikes')->name('blog.dislike');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{product}/like', 'product_likes')->name('product.like');
    Route::get('/product/{product}/dislike', 'product_dislikes')->name('product.dislike');
});
