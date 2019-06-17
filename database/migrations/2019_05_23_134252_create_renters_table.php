<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('apartment_id');
            $table->unsignedBigInteger('room_id')->nullable();    
            $table->dateTime('checkin')->nullable();
            $table->dateTime('checkout')->nullable();
            $table->boolean('is_checkout')->default(false);
            $table->string('description')->nullable();
            $table->string('customer_list')->nullable();
            $table->string('service_list')->nullable();
            $table->string('total_price')->nullable();
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
        Schema::dropIfExists('renters');
    }
}
