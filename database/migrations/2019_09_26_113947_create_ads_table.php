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
            $table->bigIncrements('id');
            $table->float('price');
            $table->string('image')->nullable();
            $table->string('phone_no');
            $table->text('description')->nullable();
            $table->date('manufacture_date');
            $table->integer('fuel');
            $table->integer('gearbox');
            $table->integer('body_type');
            $table->integer('color');
            $table->integer('steering_wheel');
            $table->integer('number_of_doors');
            $table->integer('driven_wheels');
            $table->integer('climate_control');
            $table->integer('euro_standard');
            $table->integer('mileage');
            $table->integer('engine_power');
            $table->float('engine_volume');
            $table->integer('damage');
            $table->integer('brand_id');
            $table->integer('equipment_id')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
