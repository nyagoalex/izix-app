<?php

use App\Domain\Comment\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

#=============================COMMENTS==================================
Route::controller(CommentController::class)->prefix('articles/{article}/comments')->group(function () {
    Route::get('/', 'index')->name('visitor.comments.index')->whereNumber('article');
    Route::post('/', 'store')->name('visitor.comments.store')->whereNumber('article')->whereNumber('comment');
    Route::get('/{comment}', 'show')->name('visitor.comments.show')->whereNumber('article')->whereNumber('comment');
    Route::post('/{comment}/publish', 'publish')->name('visitor.comments.publish')
    ->whereNumber('article')->whereNumber('comment');
});

