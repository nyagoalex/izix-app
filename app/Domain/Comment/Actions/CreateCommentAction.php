<?php

namespace App\Domain\Comment\Actions;

use App\Domain\Article\Models\Article;
use App\Domain\Comment\Models\Comment;
use App\Domain\Vistor\Models\Vistor;

class CreateCommentAction
{
    public function __invoke(Article $article): Comment
    {
        return $article->comments()->create([
            'vistor_id' => Vistor::first()->id,
        ]);
    }
}
