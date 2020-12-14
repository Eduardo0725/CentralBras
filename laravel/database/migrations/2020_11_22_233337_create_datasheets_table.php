<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProduct');
            $table->string('name');
            $table->text('description');
            $table->timestamps();

            $table->foreign('idProduct')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasheets');
    }
}
