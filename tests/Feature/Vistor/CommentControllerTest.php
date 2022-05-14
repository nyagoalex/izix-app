<?php

namespace Tests\Feature\Vistor;

use App\Domain\Comment\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_view_comments_for_article(): void
    {
        $comment = Comment::factory()->forVistor()->forArticle()->create();

        $this->getJson(route('visitor.comments.index', $comment->article_id))->assertStatus(200);
    }

    /** @test */
    public function can_view_single_comment_for_article(): void
    {
        $comment = Comment::factory()->forVistor()->forArticle()->create();

        $this->getJson(route('visitor.comments.show', [$comment->article_id, $comment->id]))->assertStatus(200);
    }


    /** @test */
    public function can_view_publish_comment(): void
    {
        $comment = Comment::factory()->forVistor()->forArticle()->create();

        $data = Comment::factory()->raw();

        $this->postJson(route('visitor.comments.publish', [$comment->article_id, $comment->id]), $data)->assertStatus(200);
    }
}
