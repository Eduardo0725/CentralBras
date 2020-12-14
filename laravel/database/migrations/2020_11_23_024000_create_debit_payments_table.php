<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCard')->nullable();
            $table->foreignId('idPayment');
            $table->timestamps();

            $table->foreign('idPayment')->references('id')->on('payments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idCard')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debit_payments');
    }
}
