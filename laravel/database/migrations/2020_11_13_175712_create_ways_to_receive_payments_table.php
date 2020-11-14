<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaysToReceivePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ways_to_receive_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->json('howToReceivePayments');
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ways_to_receive_payments');
    }
}
