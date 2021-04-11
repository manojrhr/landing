<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToJetSkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jet_skis', function (Blueprint $table) {
            $table->string('price_unit')->after('price');
            $table->foreignId('make_id')->constrained('makes')->after('price_unit');
            $table->foreignId('model_id')->constrained('models')->after('model_id');
            $table->string('insurance')->before('created_at');
            $table->foreignId('cancel_policy_id')->constrained('cancel_policies')->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jet_skis', function (Blueprint $table) {
            $table->dropColumn('price_unit');
            $table->dropColumn('make_id');
            $table->dropColumn('model_id');
            $table->dropColumn('insurance');
            $table->dropColumn('cancel_policy_id');
        });
    }
}
