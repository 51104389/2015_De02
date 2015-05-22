<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration {


	public function up()
	{
		Schema::create('user', function(Blueprint $table){
            $table->increments('id');
            $table->text('username');
            $table->text('name');
            $table->text('email');
            $table->text('password');
            $table->text('address');
            $table->text('phone');
            $table->text('token_login');
            $table->unsignedInteger('role');
            $table->timestamps();
        });
	}


	public function down()
	{
        Schema::dropIfExists('user');
	}

}
