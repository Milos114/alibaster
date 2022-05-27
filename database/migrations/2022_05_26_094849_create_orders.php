<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rate_id')->constrained('rates');
            $table->decimal('surchange_amount', places: 2);
            $table->decimal('exchange_rate', places: 4);
            $table->unsignedBigInteger('amount_purchased');
            $table->decimal('amount_in_usd', places: 2);
            $table->decimal('discount_percentage', places: 2)->nullable();
            $table->decimal('discount_amount', places: 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
