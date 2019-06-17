<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('apartment_id');
            $table->integer('bed')->nullable();
            $table->integer('chair')->nullable();
            $table->integer('cabinet')->nullable();
            $table->integer('air_conditional')->nullable();
            $table->boolean('bathroom')->default(true);
            $table->boolean('electric_water_heater')->default(true);
            $table->integer('floor')->nullable();
            $table->string('feature')->nullable();
            $table->string('price')->nullable();
            $table->integer('way')->nullable();
            $table->string('width')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
