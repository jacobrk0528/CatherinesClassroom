<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class File extends Model
{
    /** @use HasFactory<\Database\Factories\FileFactory> */
    use HasFactory;

    protected $fillable = [
        "file_name",
        "file_path",
        "file_type",
        "file_price"
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
            LessonFile::class,
            "file_id",
            "id",
            "id",
            "lesson_id"
        );
    }

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, "resourceable");
    }

    public function getNameAttribute(): String
    {
        return $this->file_name;
    }

    public function getPriceAttribute(): String
    {
        return $this->file_price;
    }
}
