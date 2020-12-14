<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser');
            $table->foreignId('idProduct');
            $table->enum('stars', [0, 1, 2, 3, 4, 5]);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('idProduct')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
