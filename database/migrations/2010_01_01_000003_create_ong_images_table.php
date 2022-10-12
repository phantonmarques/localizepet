<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ong_images', function (Blueprint $table) {

            $table->increments('id');

            $table->string('path');

            $table->timestamps();

            $table->unsignedInteger('ong_id');
            $table->unsignedSmallInteger('size')->default(600)->comment('Kb');
            $table->unsignedTinyInteger('position')->default(0);

            $table->foreign('ong_id')->references('id')->on('ongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ong_images');
    }
}
