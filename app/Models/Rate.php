<?php

namespace App\Models;

use Illuminate\Database\{Eloquent\Factories\HasFactory, Eloquent\Model, Eloquent\Relations\HasMany};

class Rate extends Model
{
    use HasFactory;

    public const EURO = 1;
    public const GBP = 2;
    public const JPY = 3;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function calculateRawAmount($amount): float|int
    {
        return 1 / $this->exchange_rate * $amount;
    }

    public function calculateSurchargeDollars($rawAmount): float|int
    {
        $surchargePercent = match ((int)$this->id) {
            self::EURO, self::GBP => 5,
            self::JPY => 7.5,
        };

        return $rawAmount / 100 * $surchargePercent;
    }

    public function calculateDiscountDollars($rawAmount): float|int|null
    {
        if ((int)$this->id === self::EURO) {
            return $rawAmount / 100 * 2;
        }

        return null;
    }
}
