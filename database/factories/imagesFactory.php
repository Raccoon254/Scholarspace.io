<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class imagesFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'blog_id' => $this->faker->randomDigitNotNull,
            'path' => $this->faker->word,
        ];
    }
}
