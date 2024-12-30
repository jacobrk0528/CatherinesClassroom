<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;

class Resource extends Model
{
    /** @use HasFactory<\Database\Factories\ResourceFactory> */
    use HasFactory;

    protected $fillable = [
        "resourceable_id",
        "resourceable_type"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    protected static function boot(): void
    {
        parent::boot();
        Relation::enforceMorphMap([
            'file' => \App\Models\File::class,
            'unit' => \App\Models\Unit::class,
            'lesson' => \App\Models\Lesson::class,
        ]);
    }



    // Relationships
    public function resourceable(): MorphTo
    {
        return $this->morphTo();
    }

}
