<?php

namespace Database\Factories;

use App\Models\OrderAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderAttachmentFactory extends Factory
{
    protected $model = OrderAttachment::class;

    public function definition(): array
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'path' => $this->faker->word,
            'type' => $this->faker->word,
            'size' => $this->faker->numberBetween(1, 10),
        ];
    }
}
