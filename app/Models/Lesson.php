<?php

namespace App\Models;

use illuminate\database\eloquent\factories\hasfactory;
use illuminate\database\eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        "lesson_name",
        "lesson_price"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    // Relationships
    public function files(): HasManyThrough
    {
        return $this->hasManyThrough(
            File::class,
            LessonFile::class,
            "lesson_id",
            "id",
            "id",
            "file_id"
        );
    }

    public function units(): HasManyThrough
    {
        return $this->hasManyThrough(
            Unit::class,
            UnitLesson::class,
            "lesson_id",
            "id",
            "id",
            "unit_id"
        );
    }

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, "resourceable");
    }
}
