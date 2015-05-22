<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('link_file');
            $table->timestamps();
            $table->integer('cat_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('post');
	}

}
