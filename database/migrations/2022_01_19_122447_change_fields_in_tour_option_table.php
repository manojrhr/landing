<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsInTourOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_options', function (Blueprint $table) {
            $table->dropColumn('adult_rate');
            $table->dropColumn('child_rate');
            $table->dropColumn('location_id');
            $table->unsignedBigInteger('zone_id')->after('tour_id')->default(0);
            $table->decimal('price', 8, 2)->after('zone_id');
            $table->string('title')->after('tour_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_options', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('zone_id');
            $table->dropColumn('title');
            $table->unsignedBigInteger('location_id');
            $table->string('adult_rate');
            $table->string('child_rate');
        });
    }
}
