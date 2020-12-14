<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser');
            $table->string('cep', 8);
            $table->string('state', 45);
            $table->string('city');
            $table->string('street');
            $table->string('houseNumber', 15);
            $table->string('complement')->nullable();
            $table->string('phone');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('addresses');
    }
}
