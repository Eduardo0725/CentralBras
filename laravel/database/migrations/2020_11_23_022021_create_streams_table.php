<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProduct');
            $table->foreignId('idShoppingCartPayment');
            $table->string('cost');
            $table->integer('amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('installments')->nullable();
            $table->string('interest')->nullable();
            $table->timestamps();

            $table->foreign('idProduct')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idShoppingCartPayment')->references('id')->on('shopping_cart_payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streams');
    }
}
