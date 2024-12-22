<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonFile extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFileFactory> */
    use HasFactory;

    protected $fillable = [
        "lesson_id",
        "file_id"
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

    public function files(): HasMany
    {
        return $this->hasMany(Unit::class, "id", "file_id");
    }
}
