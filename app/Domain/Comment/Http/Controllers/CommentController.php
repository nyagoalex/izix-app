<?php

namespace App\Domain\Comment\Http\Controllers;

use App\Domain\Article\Models\Article;
use App\Domain\Comment\Actions\CreateCommentAction;
use App\Domain\Comment\Actions\PublishCommentAction;
use App\Domain\Comment\DataTransferObjects\CommentData;
use App\Domain\Comment\Http\Requests\PublishCommentRequest;
use App\Domain\Comment\Http\Resources\CommentResource;

class CommentController
{
    public function index(Article $article)
    {
        return CommentResource::collection($article->comments()->latest()->paginate(10)->withQueryString());
    }


    public function store(Article $article)
    {
        $comment = (new CreateCommentAction())($article);

        return new CommentResource($comment);
    }

    public function show(Article $article, $comment_id)
    {
        $comment = $article->comments()->findOrFail($comment_id);
        return new CommentResource($comment);
    }

    public function publish(PublishCommentRequest $request, Article $article, $comment_id)
    {
        $comment = $article->comments()->findOrFail($comment_id);

        $comment = (new PublishCommentAction())($comment, new CommentData(...$request->validated()));

        return new CommentResource($comment);
    }
}
