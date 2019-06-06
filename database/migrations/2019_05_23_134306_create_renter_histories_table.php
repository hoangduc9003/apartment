<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenterHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renter_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_renter_id');
            $table->string('price')->nullable();
            $table->integer('pay_range')->nullable();
            $table->string('total_price')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renter_histories');
    }
}
