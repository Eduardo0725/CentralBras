<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProduct');
            $table->foreignId('idAddress');
            $table->timestamps();

            $table->foreign('idProduct')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idAddress')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_addresses');
    }
}
