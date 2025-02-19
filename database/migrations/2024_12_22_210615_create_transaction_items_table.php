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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->constrained("transactions", "id")->onDelete("cascade");
            /* $table->foreignId("resource_id")->constrained("resources", "id")->onDelete("cascade"); */
            $table->timestamps();

            /* $table->unique(['transaction_id', 'resource_id'], 'transaction_resource_unique'); */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
