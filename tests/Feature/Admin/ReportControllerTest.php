<?php

namespace Tests\Feature\Admin;

use App\Domain\Article\Models\Article;
use App\Domain\Vistor\Models\Vistor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function admin_can_view_reports(): void
    {
        Article::factory()
            ->count(2)
            ->hasComments(3, function () {
                return ['vistor_id' => Vistor::factory()->create()->id];
            })
            ->create();
        $this->getJson(route('admin.report'))->assertStatus(200);
    }
}
