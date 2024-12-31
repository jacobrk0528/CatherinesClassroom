<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Source;
use App\Models\Medium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "visitor_id" => $this->faker->uuid(),
            "campaign_id" => Campaign::inRandomOrder()->first()->id,
            "source_id" => Source::inRandomOrder()->first()->id,
            "medium_id" => Medium::inRandomOrder()->first()->id,
            "entry_url" => $this->faker->url(),
            "entry_referrer" => $this->faker->url(),
            "user_agent" => $this->faker->userAgent(),
        ];
    }
}
