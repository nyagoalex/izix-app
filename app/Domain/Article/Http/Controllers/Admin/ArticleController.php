<?php

namespace App\Domain\Article\Http\Controllers\Admin;

use App\Domain\Article\Actions\CreateArticleAction;
use App\Domain\Article\Actions\UpdateArticleAction;
use App\Domain\Article\Models\Article;
use App\Domain\Article\DataTransferObjects\ArticleData;
use App\Domain\Article\Http\Resources\ArticleResource;
use App\Domain\Article\Http\Requests\ArticleRequest;
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

        return ArticleResource::collection($articles);
    }

    public function store(ArticleRequest $request): ArticleResource
    {
        $article = (new CreateArticleAction())(new ArticleData(...$request->validated()));

        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        $article->load('comments');
        $article->loadCounts();

        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article = (new UpdateArticleAction())($article, new ArticleData(...$request->validated()));
        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json('success', 204);
    }
}
