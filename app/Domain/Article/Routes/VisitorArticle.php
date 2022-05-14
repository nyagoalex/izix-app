<?php

use App\Domain\Article\Http\Controllers\Visitor\ArticleController;
use Illuminate\Support\Facades\Route;

#=============================ARTICLES==================================
Route::controller(ArticleController::class)->prefix('articles')->group(function () {
    Route::get('/', 'index')->name('visitor.articles.index');
    Route::get('/{article}', 'show')->name('visitor.articles.show')->whereNumber('article');
});
