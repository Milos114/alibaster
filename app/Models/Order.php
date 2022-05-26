<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    public $guarded = [];

    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }

    protected function surchangeAmount(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => round($value, 2),
        );
    }

    protected function amountInUsd(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => round($value, 2),
        );
    }
}
