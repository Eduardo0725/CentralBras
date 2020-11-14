<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingAndSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_and_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('idBuyer');
            $table->integer('idSalesman');
            $table->integer('idHowToReceivePayments')->nullable();
            $table->integer('idCard')->nullable();
            $table->json('shoppingCart');
            $table->string('paymentMethod', 20);
            $table->text('linkInvoice')->nullable();
            $table->float('interest')->nullable();
            $table->integer('installments')->nullable();
            $table->float('discount')->nullable();
            $table->boolean('paid');
            $table->dateTime('paymentDate')->nullable();
            $table->integer('exitAddress')->nullable();
            $table->integer('addressOfReceive')->nullable();
            $table->json('information');
            $table->string('status', 45);
            $table->timestamps();

            $table->foreign('idBuyer')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('idSalesman')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('idHowToReceivePayments')->references('id')->on('ways_to_receive_payments')->onDelete('CASCADE');
            $table->foreign('idCard')->references('id')->on('cards')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_and_sales');
    }
}
