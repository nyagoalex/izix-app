<?php

namespace Database\Factories;

use App\Domain\Comment\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\App\Domain\Comment\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence,
            'published_at' => $this->faker->randomElement([$this->faker->dateTimeBetween('-1 year', 'now'), null]) ,
        ];
    }
}
