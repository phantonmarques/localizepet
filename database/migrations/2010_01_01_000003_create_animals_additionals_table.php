<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_additionals', function (Blueprint $table) {

            $table->index(['additional_id', 'animal_id']);

            $table->timestamps();

            $table->unsignedInteger('additional_id');
            $table->unsignedInteger('animal_id');

            $table->foreign('additional_id')->references('id')->on('additionals')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals_additionals');
    }
}
