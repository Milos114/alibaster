<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RateLimitsSync
{
    public function fetch(): array
    {
        $response = Http::withHeaders([
            'apikey' => config('exchange_rates.api-key'),
        ])->get('https://api.apilayer.com/currency_data/live?source=USD&currencies=eur,gbp,jpy');

        return $response->json();
    }
}