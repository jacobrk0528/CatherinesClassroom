<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitLesson extends Model
{
    /** @use HasFactory<\Database\Factories\UnitLessonFactory> */
    use HasFactory;

    protected $fillable = [
        "lesson_id",
        "unit_id"
    ];

    protected $casts = [
        "created_at",
        "updated_at"
    ];

    // Relationships
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, "id", "lesson_id");
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, "id", "unit_id");
    }
}
