<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Visitor\ArticleController as VisitorArticleController;
use App\Http\Controllers\Visitor\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
#------------------------------VISITORS-----------------------------------

// #=============================ARTICLES==================================
// Route::controller(VisitorArticleController::class)->prefix('articles')->group(function () {
//     Route::get('/', 'index')->name('visitor.articles.index');
//     Route::get('/{article}', 'show')->name('visitor.articles.show')->whereNumber('article');
// });

// #=============================COMMENTS==================================
// Route::controller(CommentController::class)->prefix('articles/{article}/comments')->group(function () {
//     Route::get('/', 'index')->name('visitor.comments.index')->whereNumber('article');
//     Route::post('/', 'store')->name('visitor.comments.store')->whereNumber('article')->whereNumber('comment');
//     Route::get('/{comment}', 'show')->name('visitor.comments.show')->whereNumber('article')->whereNumber('comment');
//     Route::post('/{comment}/publish', 'publish')->name('visitor.comments.publish')->whereNumber('article')->whereNumber('comment');
// });

#------------------------------ADMIN-----------------------------------

// #=============================ARTICLES==================================
// Route::controller(ArticleController::class)->prefix('admin/articles')->group(function () {
//     Route::get('/', 'index')->name('admin.articles.index');
//     Route::post('/', 'store')->name('admin.articles.store');
//     Route::get('/{article}', 'show')->name('admin.articles.show')->whereNumber('article');
//     Route::patch('/{article}', 'update')->name('admin.articles.update')->whereNumber('article');
//     Route::delete('/{article}', 'destroy')->name('admin.articles.destroy')->whereNumber('article');
// });

// Route::get('admin/report', ReportController::class)->name('admin.report');
