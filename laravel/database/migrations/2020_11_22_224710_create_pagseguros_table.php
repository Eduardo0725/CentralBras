<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagsegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagseguros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idHowToGetPaid');
            $table->string('email');
            $table->string('token');
            $table->timestamps();

            $table->foreign('idHowToGetPaid')->references('id')->on('ways_to_receive_payments')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagseguros');
    }
}
