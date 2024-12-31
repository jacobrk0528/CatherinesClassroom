<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\VisitorTransactionFactory> */
    use HasFactory;

    protected $fillable = [
        "visitor_id",
        "transaction_id"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];
}
