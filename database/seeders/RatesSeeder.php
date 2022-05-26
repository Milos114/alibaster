<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert(['currency' => "EUR", 'exchange_rate' => 0.884872, 'surcharge' => 5]);
        DB::table('rates')->insert(['currency' => "GBP", 'exchange_rate' => 0.711178, 'surcharge' => 5]);
        DB::table('rates')->insert(['currency' => "JPY", 'exchange_rate' => 107.17, 'surcharge' => 7.5]);
    }
}
