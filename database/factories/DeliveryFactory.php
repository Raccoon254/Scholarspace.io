<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;

    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'accepted', 'revision', 'completed', 'cancelled', 'failed']),
            'order_id' => Order::factory(),
        ];
    }
}
