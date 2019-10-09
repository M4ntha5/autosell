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
             $table->integer('ad_id')->unsigned();
             $table->integer('favorite_id')->unsigned();
             $table->rememberToken();
             $table->timestamps();

             $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('favorite_id')->references('id')->on('favorite_ads')->onDelete('cascade')->onUpdate('cascade');
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
     }
}
