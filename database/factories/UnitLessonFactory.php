<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitLesson>
 */
class UnitLessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $units = Unit::all();
        $lessons = Lesson::all();

        if (count($units) < 8) {
            Unit::factory()->count(8)->create();
        }
        if (count($lessons) < 15) {
            Lesson::factory()->count(15)->create();
        }

        return [
            "lesson_id" => Lesson::query()->inRandomOrder()->first()->id,
            "unit_id" => Unit::query()->inRandomOrder()->first()->id
        ];
    }
}
