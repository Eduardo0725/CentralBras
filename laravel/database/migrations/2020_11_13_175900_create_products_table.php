<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser');
            $table->foreignId('idCategory');
            $table->string('name');
            $table->integer('amount')->nullable();
            $table->text('description')->nullable();
            $table->boolean('productSituation');
            $table->text('universalCode')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('discount')->nullable();
            $table->string('installments')->nullable();
            $table->string('installmentsInterestFree')->nullable();
            $table->float('cost');
            $table->string('warranty');
            $table->string('warrantyDay')->nullable();
            $table->string('warrantyMonth')->nullable();
            $table->string('warrantyYear')->nullable();
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
