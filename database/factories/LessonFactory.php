<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daysDiff = $this->faker->randomNumber(1);
        $sign = $this->faker->randomElement([-1, 1]);
        $days = $daysDiff * $sign;

        return [
            "lesson_name" => $this->faker->word(),
            "lesson_price" => $this->faker->randomFloat(2, 30, 100),
            "created_at" => Carbon::now()->addDays($days),
            "updated_at" => Carbon::now()->addDays($days),
        ];
    }
}
