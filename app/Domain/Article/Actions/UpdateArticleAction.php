<?php

namespace App\Domain\Article\Actions;

use App\Domain\Article\DataTransferObjects\ArticleData;
use App\Domain\Article\Models\Article;

class UpdateArticleAction
{
    public function __invoke(Article $article, ArticleData $data): Article
    {
        $article->update($data->toArray());

        return $article->refresh();
    }
}
