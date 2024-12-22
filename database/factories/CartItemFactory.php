<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carts = Cart::factory()->count(10)->create();
        $resources = Resource::all();

        if ($carts->count() > 0) {
            $cart = $carts->random();
        } else {
            $cart = Cart::factory()->create();
        }

        if ($resources->count() > 100) {
            $resource = $resources->random();
        } else {
            Resource::factory()->count(100)->create();
            $resource = $resources->random();
        }

        return [
            "cart_id" => $cart->id,
            "resource_id" => $resource->id
        ];
    }
}
