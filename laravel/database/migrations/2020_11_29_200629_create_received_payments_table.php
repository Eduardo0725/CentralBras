<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('received_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idHowToGetPaid')->nullable();
            $table->foreignId('idPayment');
            $table->timestamps();

            $table->foreign('idHowToGetPaid')->references('id')->on('ways_to_receive_payments');
            $table->foreign('idPayment')->references('id')->on('payments')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('received_payments');
    }
}
