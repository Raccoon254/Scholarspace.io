<?php

namespace Database\Factories;

use App\Models\Blogs;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogsFactory extends Factory
{
    protected $model = Blogs::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'title' => $this->faker->word,
            'content' => $this->faker->text,
            'slug' => $this->faker->slug,
        ];
    }
}
