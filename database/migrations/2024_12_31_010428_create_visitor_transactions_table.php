<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitor_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("visitor_id")->constrained("visitors", "id")->cascadeOnDelete()->name("visitor_transactions.visitor_id");
            $table->foreignId("transaction_id")->constrained("transactions", "id")->cascadeOnDelete()->name("visitor_transaction.transaction_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_transactions');
    }
};
