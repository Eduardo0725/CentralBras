<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idBuyer');
            $table->foreignId('idSalesman');
            $table->foreignId('idDeliveryAddress');
            $table->timestamps();

            $table->foreign('idBuyer')->references('id')->on('users');
            $table->foreign('idSalesman')->references('id')->on('users');
            $table->foreign('idDeliveryAddress')->references('id')->on('addresses')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_payments');
    }
}
