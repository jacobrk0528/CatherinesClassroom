<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Unit;

class ResourceFactory extends Factory
{
    public function definition(): array
    {
        $models = [
            File::class,
            Lesson::class,
            Unit::class,
        ];

        $resourceableType = $this->faker->randomElement($models);
        $resourceableId = $resourceableType::query()->inRandomOrder()->first()->id;

        return [
            'resourceable_type' => $resourceableType,
            'resourceable_id' => $resourceableId,
        ];
    }
}
