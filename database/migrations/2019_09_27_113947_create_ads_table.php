<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->string('image')->nullable();
            $table->string('phone_no');
            $table->text('description')->nullable();
            $table->date('manufacture_date');
            $table->mediumInteger('mileage');
            $table->smallInteger('engine_power');
            $table->float('engine_volume');
            $table->smallInteger('damage');
            $table->integer('fuel_id')->unsigned();
            $table->integer('gearbox_id')->unsigned();
            $table->integer('body_type_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('steering_wheel_id')->unsigned();
            $table->integer('number_of_doors_id')->unsigned();
            $table->integer('driven_wheels_id')->unsigned();
            $table->integer('climate_control_id')->unsigned();
            $table->integer('euro_standard_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();


            $table->foreign('fuel_id')->references('id')->on('fuel_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gearbox_id')->references('id')->on('gearbox_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('body_type_id')->references('id')->on('body_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('steering_wheel_id')->references('id')->on('steering_wheel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('number_of_doors_id')->references('id')->on('number_of_doors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('driven_wheels_id')->references('id')->on('driven_wheels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('climate_control_id')->references('id')->on('climate_control')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('euro_standard_id')->references('id')->on('euro_standard')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('ads');
        $table->dropForeign('ads_user_id_foreign');
        $table->dropForeign('ads_brand_id_foreign');
        $table->dropForeign('ads_fuel_id_foreign');
        $table->dropForeign('ads_gearbox_id_foreign');
        $table->dropForeign('ads_body_type_id_foreign');
        $table->dropForeign('ads_color_id_foreign');
        $table->dropForeign('ads_steering_wheel_id_foreign');
        $table->dropForeign('ads_number_of_doors_id_foreign');
        $table->dropForeign('ads_driven_wheels_id_foreign');
        $table->dropForeign('ads_climate_control_id_foreign');
        $table->dropForeign('ads_euro_standard_id_foreign');

    }
}
