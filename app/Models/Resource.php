<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Resource extends Model
{
    /** @use HasFactory<\Database\Factories\ResourceFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "type",
        "path",
        "parent_id",
        "mime_type",
        "price"
    ];

    protected function casts(): array
    {
        return [
            "created_at" => "datetime",
            "updated_at" => "datetime",
        ];
    }

    /**
     * Parent-Child Relationship (For Nested Folders & Files)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Resource::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Resource::class, 'parent_id');
    }

    /**
     * Get only files (excluding folders)
     */
    public function files(): HasMany
    {
        return $this->hasMany(Resource::class, 'parent_id')->where('mime_type', '!=', 'Folder');
    }

    /**
     * Get only folders (excluding files)
     */
    public function folders(): HasMany
    {
        return $this->hasMany(Resource::class, 'parent_id')->where('mime_type', 'Folder');
    }

    public function scopeUnits(Builder $query): Builder
    {
        return $query->where("parent_id", null)->where("type", "unit");
    }
}
