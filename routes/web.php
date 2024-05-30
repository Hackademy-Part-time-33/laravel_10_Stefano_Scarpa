<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/contatti', [PageController::class, 'contacts'])->name('contacts');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'dashboard'])->name('articles.dashboard');
    Route::resource('articles', ArticleController::class);
});




