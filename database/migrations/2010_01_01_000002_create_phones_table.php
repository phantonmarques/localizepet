<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {

            $table->increments('id');

            $table->boolean('main')->default(false);
            $table->boolean('whatsapp')->default(false);
            $table->string('number');

            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('type_id');

            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('phone_types')->onDelete('cascade');
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
        Schema::dropIfExists('phones');
    }
}
