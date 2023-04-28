<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name', 100)->nullable();
            $table->string('slug', 100)->nullable();

            $table->unsignedInteger('animal_type_id');

            $table->timestamps();

            $table->foreign('animal_type_id')->references('id')->on('animal_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
