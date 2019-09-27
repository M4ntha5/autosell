<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price');
            $table->string('phone_no');
            $table->date('manufacture_date_from');
            $table->date('manufacture_date_to');
            $table->smallInteger('fuel');
            $table->smallInteger('gearbox');
            $table->smallInteger('body_type');
            $table->smallInteger('color');
            $table->smallInteger('steering_wheel');
            $table->smallInteger('number_of_doors');
            $table->smallInteger('driven_wheels');
            $table->smallInteger('climate_control');
            $table->smallInteger('euro_standard');
            $table->mediumInteger('mileage')->nullable();
            $table->smallInteger('engine_power');
            $table->float('engine_volume');
            $table->smallInteger('damage');
            $table->integer('status');
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
        Schema::dropIfExists('orders');
    }
}
