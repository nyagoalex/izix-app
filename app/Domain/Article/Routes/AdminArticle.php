<?php

use App\Domain\Article\Http\Controllers\Admin\ArticleController;
use App\Domain\Article\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

#=============================ARTICLES==================================
Route::controller(ArticleController::class)->prefix('admin/articles')->group(function () {
    Route::get('/', 'index')->name('admin.articles.index');
    Route::post('/', 'store')->name('admin.articles.store');
    Route::get('/{article}', 'show')->name('admin.articles.show')->whereNumber('article');
    Route::patch('/{article}', 'update')->name('admin.articles.update')->whereNumber('article');
    Route::delete('/{article}', 'destroy')->name('admin.articles.destroy')->whereNumber('article');
});

Route::get('admin/report', ReportController::class)->name('admin.report');
