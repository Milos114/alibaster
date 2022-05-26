<?php

namespace App\Services\Order;

use App\Models\Rate;

class OrderPurchase
{
    public static function process(...$args)
    {
        $strategy = match ((int)$args['currency']) {
            Rate::EURO => EurPurchase::class,
            Rate::GBP => GbpPurchase::class,
            Rate::JPY => JpyPurchase::class,
        };

        return (new $strategy)->handle($args);
    }
}