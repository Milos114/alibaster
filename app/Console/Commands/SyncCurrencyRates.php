<?php

namespace App\Console\Commands;

use App\Services\RateLimitsSync;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch up to date currency rates.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(RateLimitsSync $rateSync)
    {
        $rates = $rateSync->fetch()['quotes'];

        collect($rates)->each(fn($val, $currency) => DB::table('rates')
            ->where('currency', substr($currency, 3))
            ->update([
                'exchange_rate' => $val
            ])
        );
    }
}
