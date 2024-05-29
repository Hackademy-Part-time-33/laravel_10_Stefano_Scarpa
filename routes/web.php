<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/contatti', [PageController::class, 'contacts'])->name('contacts');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/article/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/dashboard', [ArticleController::class, 'dashboard'])->name('articles.dashboard');

Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');




