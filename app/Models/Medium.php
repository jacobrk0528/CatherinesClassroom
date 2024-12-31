<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medium extends Model
{
    /** @use HasFactory<\Database\Factories\MediumFactory> */
    use HasFactory;

    protected $table = "mediums";

    protected $fillable = [
        "name"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }
}
