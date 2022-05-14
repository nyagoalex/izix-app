<?php

namespace Database\Seeders;

use App\Domain\Article\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domain\Vistor\Models\Vistor;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()
            ->count(50)
            ->hasComments(3, function () {
                return ['vistor_id' => Vistor::factory()->create()->id];
            })
            ->create();

            Article::factory()
            ->count(5)
            ->create();
    }
}
