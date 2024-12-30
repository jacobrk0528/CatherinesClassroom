<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    public function definition(): array
    {
        $morphTypes = [
            'file' => \App\Models\File::class,
            'unit' => \App\Models\Unit::class,
            'lesson' => \App\Models\Lesson::class,
        ];

        $morphType = $this->faker->randomElement(array_keys($morphTypes));

        return [
            'resourceable_type' => $morphType, // Key from the morph map
            'resourceable_id' => $morphTypes[$morphType]::query()->inRandomOrder()->value('id') ?: 1, // Random ID
        ];
    }

}
