<?php

namespace Database\Factories;

use App\Models\images;
use Illuminate\Database\Eloquent\Factories\Factory;

class imagesFactory extends Factory
{
    protected $model = images::class;

    public function definition(): array
    {
        return [
            'blog_id' => $this->faker->randomDigitNotNull,
            'path' => $this->faker->word,
        ];
    }
}
