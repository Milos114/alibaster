<?php

use Database\Seeders\{DatabaseSeeder, RatesSeeder};
use Illuminate\Database\{Migrations\Migration, Schema\Blueprint};
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->decimal('exchange_rate', places: 4);
            $table->decimal('surcharge');
            $table->timestamps();
        });

        (new DatabaseSeeder)->call(RatesSeeder::class);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
