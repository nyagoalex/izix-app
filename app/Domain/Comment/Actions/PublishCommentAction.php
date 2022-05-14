<?php

namespace App\Domain\Comment\Actions;

use App\Domain\Comment\DataTransferObjects\CommentData;
use App\Domain\Comment\Models\Comment;

class PublishCommentAction
{
    public function __invoke(Comment $comment, CommentData $data): Comment
    {
        $data = array_merge($data->toArray(), [
            'published_at' => now()
        ]);
        $comment->update($data);

        return $comment->fresh();
    }
}
