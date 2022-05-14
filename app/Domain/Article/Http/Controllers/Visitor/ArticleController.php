<?php

namespace App\Domain\Article\Http\Controllers\Visitor;

use App\Domain\Article\Models\Article;
use App\Domain\Article\Http\Resources\VistorArticleResource;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ArticleController
{
    public function index()
    {
        $articles = QueryBuilder::for(Article::query())
            ->with('comments')
            ->allowedIncludes(['comments'])
            ->allowedFilters(['title', 'author',
                AllowedFilter::callback('has_comments', function (Builder $query, $value) {
                    $query->whereHas('comments');
                }),
            ])
            ->includeCounts()
            ->latest()
            ->paginate(10)->withQueryString();

        return VistorArticleResource::collection($articles);
    }

    public function show(Article $article)
    {
        $article->load('comments');
        return new VistorArticleResource($article);
    }
}
