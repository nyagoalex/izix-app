<?php

namespace Tests\Feature\Vistor;

use App\Domain\Article\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function visitor_can_view_articles(): void
    {
        Article::factory()->create();
        $this->getJson(route('visitor.articles.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function visitor_can_view_asingle_article()
    {
        #create fake user object to post and the create id
        $article = Article::factory()->create();

        $response = $this->getJson(route('visitor.articles.show', $article->id));
        $response->assertStatus(200);
    }
}
