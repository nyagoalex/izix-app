<?php

namespace App\Domain\Article\Actions;

use App\Domain\Article\DataTransferObjects\ArticleData;
use App\Domain\Article\Models\Article;

class CreateArticleAction
{
    public function __invoke(ArticleData $data): Article
    {
        return Article::create($data->toArray());
    }
}
