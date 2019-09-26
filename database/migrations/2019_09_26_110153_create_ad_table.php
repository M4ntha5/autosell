<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('price', 10, 0);
			$table->string('image', 256);
			$table->string('phone_no', 12);
			$table->text('description', 65535);
			$table->date('manufacture_date');
			$table->string('fuel', 20);
			$table->string('gearbox', 20);
			$table->string('body_type', 20);
			$table->string('color', 20);
			$table->integer('run');
			$table->string('engine_power', 10);
			$table->float('engine_volume', 10, 0);
			$table->string('defects', 50);
			$table->integer('brand_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ad');
	}

}
