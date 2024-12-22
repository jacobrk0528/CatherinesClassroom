<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonFile>
 */
class LessonFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $files = File::all();
        $lessons = Lesson::all();

        if (count($files) < 100) {
            File::factory()->count(100)->create();
        }
        if (count($lessons) < 15) {
            Lesson::factory()->count(15)->create();
        }

        return [
            "lesson_id" => Lesson::query()->inRandomOrder()->first()->id,
            "file_id" => File::query()->inRandomOrder()->first()->id
        ];
    }
}
