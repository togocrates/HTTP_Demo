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

// Status code demo view
Route::get('status-demo', function () {
    return view('status-codes');
});
// HTTP Status Code Demo Routes
use App\Http\Controllers\StatusCodeDemoController;
Route::prefix('status')->group(function () {
    Route::get('ok', [StatusCodeDemoController::class, 'ok']); // 200
    Route::get('created', [StatusCodeDemoController::class, 'created']); // 201
    Route::get('nocontent', [StatusCodeDemoController::class, 'noContent']); // 204
    Route::get('moved', [StatusCodeDemoController::class, 'movedPermanently']); // 301
    Route::get('bad', [StatusCodeDemoController::class, 'badRequest']); // 400
    Route::get('unauthorized', [StatusCodeDemoController::class, 'unauthorized']); // 401
    Route::get('forbidden', [StatusCodeDemoController::class, 'forbidden']); // 403
    Route::get('notfound', [StatusCodeDemoController::class, 'notFound']); // 404
    Route::get('unprocessable', [StatusCodeDemoController::class, 'unprocessable']); // 422
    Route::get('error', [StatusCodeDemoController::class, 'serverError']); // 500
});
