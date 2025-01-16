<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();

        if ($users->count() === 0) {
            User::factory()->count(10)->create();
            $users = User::all();
        }

        return [
            "user_id" => $users->random()->id,
            "cart_total" => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}

