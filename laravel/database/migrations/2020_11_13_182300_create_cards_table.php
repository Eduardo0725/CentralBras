<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser');
            $table->string('cardNumber', 16);
            $table->string('cardHouder', 18);
            $table->string('dayOfValidity', 2);
            $table->string('yearOfValidity', 2);
            $table->string('cvv', 3);
            $table->string('cardHolderCPF', 11);
            $table->date('cardHolderDateOfBirth');
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
        Schema::dropIfExists('cards');
    }
}
