<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title', 100)->nullable();
            $table->string('size', 100)->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            $table->unsignedInteger('animal_status_id');
            $table->unsignedInteger('breed_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('location_id');

            $table->foreign('animal_status_id')->references('id')->on('animal_status')->onDelete('cascade');
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
