<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clams', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->string('UUID');
			$table->string('client_timestamp');
			$table->double('size')->unsigned();
			$table->integer('section_id')->unsigned();
			$table->timestamps();
			
			$table->unique(array('UUID', 'client_timestamp'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('clams');
	}

}
