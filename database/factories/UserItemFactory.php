<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserItem>
 */
class UserItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carts = Cart::all();
        $resources = Resource::all();

        if ($carts->count() < 5) {
            Cart::factory()->count(10)->create();
        }

        if ($resources->count() < 5) {
            Resource::factory()->count(10)->create();
        }

        $cart = $carts->random();
        $resource = $resources->random();

        return [
            "cart_id" => $cart->id,
            "resource_id" => $resource->id
        ];
    }
}
