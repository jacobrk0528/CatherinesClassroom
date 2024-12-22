<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    /** @use HasFactory<\Database\Factories\UserItemFactory> */
    use HasFactory;

    protected $fillable = [
        "cart_id",
        "resource_id"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];
}
