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
            $table->integer('booking_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('location_id');
            $table->date('date');
            $table->integer('adult_rate');
            $table->integer('child_rate');
            $table->integer('total_amount');
            $table->integer('adult_count');
            $table->integer('child_count');
            $table->string('amount_charged')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('token')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->text('pickup_info')->nullable();
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
