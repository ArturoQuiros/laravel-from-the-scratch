<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post'); //where, or whereAlpha, whereNumber, whereAlphaNumeric
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('/register', [RegisterController::class, 'create'])->widdleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->widdleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->widdleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->widdleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->widdleware('auth');