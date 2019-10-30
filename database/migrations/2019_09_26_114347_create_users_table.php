<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('users', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('email')->unique();
             $table->timestamp('email_verified_at')->nullable();
             $table->string('password');
             $table->smallInteger('user_level')->nullable();
             $table->integer('country_id')->unsigned()->nullable();
             $table->integer('city_id')->unsigned()->nullable();
             $table->rememberToken();
             $table->timestamps();


             $table->foreign('country_id')->references('id')->on('countrys')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('city_id')->references('id')->on('citys')->onDelete('cascade')->onUpdate('cascade');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('users');
         $table->dropForeign('users_country_id_foreign');
         $table->dropForeign('users_city_id_foreign');
     }
}
