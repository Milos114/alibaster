<?php

namespace App\Services\Order;

use App\Models\Rate;
use App\Notifications\CurrencyPurchased;
use Illuminate\Support\Facades\Notification;

class GbpPurchase
{
    public function handle($args): void
    {
        $currency = Rate::find($args['currency']);

        $order = $currency->orders()->create([
            'surchange_amount' => $args['surchargeDollars'],
            'amount_purchased' => $args['amount'],
            'amount_in_usd' => $args['usd'],
            'exchange_rate' => $currency->exchange_rate
        ]);

        Notification::route('mail', config('mail.owner.address'))
            ->notify(new CurrencyPurchased($order));
    }
}