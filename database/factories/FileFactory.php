<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
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
            "file_name" => $this->faker->word(),
            "file_path" => $this->faker->filePath(),
            "file_type" => $this->faker->fileExtension(),
            "file_price" => $this->faker->randomFloat(2, 5, 30),
            "created_at" => Carbon::now()->addDays($days),
            "updated_at" => Carbon::now()->addDays($days),
        ];
    }
}
