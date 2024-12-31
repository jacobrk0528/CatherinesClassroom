<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Cart;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Medium;
use App\Models\Resource;
use App\Models\Source;
use App\Models\Transaction;
use App\Models\TransactionItems;
use App\Models\Unit;
use App\Models\User;
use App\Models\Visitor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            "name" => "Jacob Krebs",
            "email" => "jacobkrebs0528@gmail.com",
            "role" => "admin",
        ]);

        User::factory()->count(25)->create();
        File::factory()->count(200)->create();
        Lesson::factory()->count(50)->create();
        Unit::factory()->count(10)->create();
        Resource::factory()->count(50)->create();

        Cart::factory()->create([
            "user_id" => $user->id
        ]);

        Cart::factory()->count(10)->create();
        Transaction::factory()->count(500)->create();

        foreach (Transaction::all() as $transaction) {
            $id1 = Resource::inRandomOrder()->first()->id;

            TransactionItems::factory()->count(1)->create([
                "transaction_id" => $transaction->id,
                "resource_id" => $id1
            ]);

            do {
                $id2 = Resource::inRandomOrder()->first()->id;
            } while ($id1 == $id2);

            TransactionItems::factory()->count(1)->create([
                "transaction_id" => $transaction->id,
                "resource_id" => $id2
            ]);
        }

        Campaign::factory()->count(100)->create();
        Source::factory()->count(50)->create();
        Medium::factory()->count(25)->create();
        Visitor::factory()->count(1000)->create();
    }
}
