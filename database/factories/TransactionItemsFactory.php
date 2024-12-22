<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionItems>
 */
class TransactionItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transactions = Transaction::all();
        $resources = Resource::all();

        if ($transactions->count() < 5) {
            Transaction::factory()->count(10)->create();
        }

        if ($resources->count() < 5) {
            Resource::factory()->count(10)->create();
        }

        $transaction = $transactions->random();
        $resource = $resources->random();

        return [
            "transaction_id" => $transaction->id,
            "resource_id" => $resource->id
        ];
    }
}
