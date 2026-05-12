<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/news/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ArticleController::class, 'admin'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
    Route::post('/store', [ArticleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ArticleController::class, 'destroy'])->name('destroy');
});
