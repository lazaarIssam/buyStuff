<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned()->after('id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            //-------------
            $table->bigInteger('localisation_id')->unsigned()->after('id');
            $table->foreign('localisation_id')->references('id')->on('localisations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
            //----------------
            $table->dropForeign(['localisation_id']);
            $table->dropColumn('localisation_id');
        });
    }
}
