<?php

namespace App\Domain\Article\Http\Controllers\Admin;

use App\Domain\Article\Models\Article;
use App\Domain\Comment\Models\Comment;
use App\Domain\Vistor\Models\Vistor;

class ReportController
{
    public function __invoke()
    {
        return response()->json([
            'articles' => Article::count(),
            'comments' => Comment::count(),
            'published_comments' => Comment::whereNotNull('published_at')->count(),
            'abandoned_comments' => Comment::whereNull('published_at')->count(),
            'visitors' => Vistor::count(),
        ]);
    }
}
