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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->uuid("visitor_id")->unique()->index();
            $table->foreignId("campaign_id")
                ->constrained("campaigns", "id")
                ->cascadeOnDelete()
                ->index()
                ->name('fk_visitors_campaign_id');
            $table->foreignId("medium_id")
                ->constrained("mediums", "id")
                ->cascadeOnDelete()
                ->index()
                ->name('fk_visitors_medium_id');
            $table->foreignId("source_id")
                ->constrained("sources", "id")
                ->cascadeOnDelete()
                ->index()
                ->name('fk_visitors_source_id');

            $table->text("entry_url");
            $table->text("entry_referrer")->nullable();
            $table->string("user_agent", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
