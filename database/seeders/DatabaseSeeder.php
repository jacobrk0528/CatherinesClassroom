<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Cart;
use App\Models\CartItem;
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
use Hash;
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
            "email" => "jkrebs@trinityroad.com",
            "role" => "admin",
            "password" => Hash::make("#Lovemykidsx2"),
        ]);

    }
}
