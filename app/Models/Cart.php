<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "cart_total"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    // Relationships
    public function resources(): HasManyThrough
    {
        return $this->hasManyThrough(
            Resource::class,
            CartItem::class,
            "cart_id",
            "id",
            "id",
            "resource_id"
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            "user_id",
            "id"
        );
    }
}
