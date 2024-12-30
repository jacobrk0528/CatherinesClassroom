<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\Transaction;
use App\Models\TransactionItems;
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
    public function definition()
    {
        return [
            // Dummy placeholders, will be replaced in a custom method
            'transaction_id' => null,
            'resource_id' => null,
        ];
    }

    public function withUniqueCombination()
    {
        return $this->state(function () {
            static $usedCombinations = [];

            do {
                // Fetch random existing transaction and resource IDs
                $transactionId = Transaction::inRandomOrder()->value('id');
                $resourceId = Resource::inRandomOrder()->value('id');

                // Combine the IDs to form a unique key
                $combination = "{$transactionId}_{$resourceId}";
            } while (
                in_array($combination, $usedCombinations) ||
                    TransactionItems::where('transaction_id', $transactionId)
                        ->where('resource_id', $resourceId)
                        ->exists()
            );

            $usedCombinations[] = $combination;

            return [
                'transaction_id' => $transactionId,
                'resource_id' => $resourceId,
            ];
        });
    }
}

