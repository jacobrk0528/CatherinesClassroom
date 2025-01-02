<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;

    protected $fillable = [
        "cart_id",
        "resource_id",
        "quantity"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    public function Cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function Resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
