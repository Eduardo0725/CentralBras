<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCard');
            $table->string('cep', 8);
            $table->string('state', 45);
            $table->string('city');
            $table->string('street');
            $table->string('houseNumber', 15);
            $table->string('complement')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('card_addresses');
    }
}
