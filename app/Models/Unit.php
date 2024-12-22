<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Unit extends Model
{
    /** @use HasFactory<\Database\Factories\UnitFactory> */
    use HasFactory;

    protected $fillable = [
        "unit_name",
        "unit_price"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    // Relationships
    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(
            Lesson::class,
            UnitLesson::class,
            "unit_id",
            "id",
            "id",
            "lesson_id"
        );
    }

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, "resourceable");
    }
}
