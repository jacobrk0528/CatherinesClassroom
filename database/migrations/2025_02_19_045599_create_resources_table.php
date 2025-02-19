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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->text("desecription")->nullable(); // only for units/lessons
            $table->string("type", 10); // unit, lesson, or item
            $table->string("path")->nullable(); // only for files
            $table->foreignId("parent_id")->nullable()->constrained("resources", "id")->cascadeOnDelete();
            $table->string("mime_type", 10); // file mimetype or "Folder"
            $table->decimal("price", 8, 2)->nullable(); // only for files
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
