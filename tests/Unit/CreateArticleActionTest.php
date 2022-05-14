<?php

namespace Tests\Unit;

use App\Domain\Article\Actions\CreateArticleAction;
use App\Domain\Article\DataTransferObjects\ArticleData;
use App\Domain\Article\Models\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateArticleActionTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function action_to_create_article(): void
    {
        $data = new ArticleData('title', 'author', 'content');
        $action = new CreateArticleAction();
        $article = $action($data);
        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('title', $article->title);
        $this->assertDatabaseHas('articles', ['title' => $article->title]);
    }
}
