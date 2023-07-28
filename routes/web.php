<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\PostController;
use App\Http\Controllers\CommentController;

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



Auth::routes();

Route::group(["middleware" => "auth"], function(){
            //users can not use any function without log in
    Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/show/{id}/post', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    Route::get('/edit/{id}/post', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::post('/update/{id}/post', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/delete/{id}/post', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.delete');
    #homework delete post

    #comments
    Route::post('/comment/{post_id}/store', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comment/{id}/delete', [CommentController::class, 'destroy'])->name('comments.delete');




    #homework -delete comments
});


