<?php

namespace Database\Factories;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReferralFactory extends Factory
{
    protected $model = Referral::class;

    public function definition(): array
    {
        return [
            'referred_email' => $this->faker->unique()->safeEmail,
            'discount_amount' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'referrer_id' => User::factory(),
        ];
    }
}
