<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

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
