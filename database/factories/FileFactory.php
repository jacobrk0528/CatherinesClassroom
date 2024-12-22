<?php

namespace Database\Factories;

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
        return [
            "file_name" => $this->faker->word(),
            "file_path" => $this->faker->filePath(),
            "file_type" => $this->faker->fileExtension(),
            "file_price" => $this->faker->randomFloat(2, 5, 30)
        ];
    }
}
