<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaeteFavoriteAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body');
            $table->integer('ad_id')->unsigned();
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_ads');
        $table->dropForeign('favorite_ads_ad_id_foreign');
    }
}
