<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "transaction_status",
        "transaction_amount",
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resources(): HasManyThrough
    {
        return $this->hasManyThrough(
            Resource::class,
            TransactionItems::class,
            "transaction_id",
            "id",
            "id",
            "resource_id"
        );
    }

    // Scopes
    public function scopeStatus(Builder $query, string|array $status): Builder
    {
        if (is_array($status)) {
            return $query->whereIn('transaction_status', $status);
        }

        return $query->where('status', $status);
    }

    public function scopeDateBetween(Builder $query, string $startDate, string $endDate): Builder
    {
        return $query->whereBetween("created_at", [Carbon::parse($startDate), Carbon::parse($endDate)]);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->setTimezone("America/New_york")
            ->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->setTimezone("America/New_york")
            ->format('Y-m-d H:i:s');
    }
}
