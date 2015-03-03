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
			$table->string('client_timestamp')->unique();
			$table->integer('transect_id')->unsigned();
			$table->integer('section_number');
			$table->double('size')->unsigned();
			$table->text('message');
			$table->double('latitude');
			$table->double('longitude');
			$table->double('accuracy');
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
		Schema::dropIfExists('clams');
	}

}
