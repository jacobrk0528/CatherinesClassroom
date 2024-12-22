<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItems extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionItemsFactory> */
    use HasFactory;

    protected $fillable = [
        "transaction_id",
        "resource_id"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];
}
