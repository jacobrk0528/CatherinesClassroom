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

    protected $appends = [
        'name',
        'price',
        'lesson_count',
    ];

    // Relationships
    /**
    * Define Lessons relationship
    *
    * @return HasManyThrough
    */
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

    /**
    * Define resource relationship
    *
    * @return MorphMany
    */
    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, "resourceable");
    }

    public function getNameAttribute(): String
    {
        return $this->unit_name;
    }

    public function getPriceAttribute(): String
    {
        return $this->unit_price;
    }

    public function getLessonCountAttribute(): int
    {
        return count($this->lessons);
    }
}
