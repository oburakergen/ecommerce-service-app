<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subscription extends Model
{
    use HasFactory;


    protected $fillable = [
        'renewed_at',
        'expired_at',
        'user_id'
    ];

    public function scopeActive($query)
    {
        return $query->where('expired_at', '<', now());
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
