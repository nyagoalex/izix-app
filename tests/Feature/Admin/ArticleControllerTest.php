<?php

namespace Tests\Feature\Admin;

use App\Domain\Article\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_view_articles(): void
    {
        Article::factory()->create();
        $this->getJson(route('admin.articles.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function admin_can_view_asingle_article()
    {
        #create fake user object to post and the create id
        $article = Article::factory()->create();

        $response = $this->getJson(route('admin.articles.show', $article->id));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function admin_can_update_article()
    {
        #create fake user object to post
        $article = Article::factory()->create();
        $new_data = Article::factory()->raw();
        $response = $this->patchJson(route('admin.articles.update', $article->id), $new_data);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function admin_can_delete_article()
    {
        #create fake user object to post
        $article = Article::factory()->create();
        $response = $this->deleteJson(route('admin.articles.destroy', $article->id));
        $response->assertStatus(204);
    }
}
