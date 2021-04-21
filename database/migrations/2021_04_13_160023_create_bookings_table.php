<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jetski_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('seller_id');
            $table->Integer('hours')->nullable();
            $table->Integer('minutes')->nullable();
            $table->Integer('nights')->nullable();
            $table->date('checkin_date')->nullable();
            $table->date('flex_start_date')->nullable();
            $table->date('flex_end_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->Integer('adults');
            $table->Integer('seniors');
            $table->Integer('children');
            $table->Integer('infants');
            $table->text('visitor_message');
            $table->date('confirmed_date')->nullable();
            $table->time('confirmed_time')->nullable();
            $table->boolean('confirmed');
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
        Schema::dropIfExists('bookings');
    }
}
