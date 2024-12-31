<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Visitor extends Model
{
    /** @use HasFactory<\Database\Factories\VisitorFactory> */
    use HasFactory;

    protected $fillable = [
        "visitor_id",
        "campaign_id",
        "medium_id",
        "source_id",
        "entry_url",
        "entry_referrer",
        "user_agent"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    public function medium(): BelongsTo
    {
        return $this->belongsTo(Medium::class);
    }

    public function transactions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Transaction::class,
            VisitorTransaction::class,
            "visitor_id",
            "id",
            "id",
            "transaction_id"
        );
    }

    public function getUrlAttribute(): String
    {
        return $this->entry_url;
    }

    public function getReferrerAttribute(): String
    {
        return $this->entry_referrer;
    }
}
