<?php

namespace App\Services\Order;

use App\Models\Rate;

class JpyPurchase
{
    public function handle($args): void
    {
        $currency = Rate::find($args['currency']);

        $currency->orders()->create([
            'surchange_amount' => $args['surchargeDollars'],
            'amount_purchased' => $args['amount'],
            'amount_in_usd' => $args['usd'],
            'exchange_rate' => $currency->exchange_rate
        ]);
    }
}