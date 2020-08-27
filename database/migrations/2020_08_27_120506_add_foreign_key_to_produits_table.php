<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->bigInteger('restaurant_id')->unsigned()->after('id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            //-------------
            $table->bigInteger('typeproduit_id')->unsigned()->after('id');
            $table->foreign('typeproduit_id')->references('id')->on('typeproduits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropColumn('restaurant_id');
            //----------------
            $table->dropForeign(['typeproduit_id']);
            $table->dropColumn('typeproduit_id');
        });
    }
}
