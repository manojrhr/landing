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
            $table->foreign('jetski_id')->references('id')->on('jet_skis');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('seller_id')->references('id')->on('users');
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
            $table->Integer('visitor_message');
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
