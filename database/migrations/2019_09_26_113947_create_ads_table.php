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
            $table->smallInteger('fuel');
            $table->smallInteger('gearbox');
            $table->smallInteger('body_type');
            $table->smallInteger('color');
            $table->smallInteger('steering_wheel');
            $table->smallInteger('number_of_doors');
            $table->smallInteger('driven_wheels');
            $table->smallInteger('climate_control');
            $table->smallInteger('euro_standard');
            $table->mediumInteger('mileage');
            $table->smallInteger('engine_power');
            $table->float('engine_volume');
            $table->smallInteger('damage');
            $table->integer('brand_id');
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
