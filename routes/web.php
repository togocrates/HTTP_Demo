<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Post resource routes for HTTP methods demo
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('posts/{post}', [PostController::class, 'patch'])->name('posts.patch');
Route::options('posts', [PostController::class, 'options'])->name('posts.options');

// Reset demo data for HTTP methods demo
Route::post('posts/reset-demo', [PostController::class, 'resetDemo'])->name('posts.resetDemo');
