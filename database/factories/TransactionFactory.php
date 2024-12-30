<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();

        if ($users->count() < 5) {
            User::factory()->count(10)->create();
        }

        $user = $users->random();

        $daysDiff = $this->faker->randomNumber(1);
        $sign = $this->faker->randomElement([-1, 1]);
        $days = $daysDiff * $sign;

        $randomTime = $this->faker->time('H:i:s'); // Generates a random time in 'HH:MM:SS' format

        $randomDateTime = Carbon::now()
            ->addDays($days)
            ->setTimeFromTimeString($randomTime);

        return [
            "user_id" => $user->id,
            "transaction_status" => $this->faker->randomElement(["pending", "completed", "failed"]),
            "transaction_amount" => $this->faker->randomFloat(2, 10, 1000),
            "created_at" => $randomDateTime,
            "updated_at" => $randomDateTime,
        ];
    }
}
