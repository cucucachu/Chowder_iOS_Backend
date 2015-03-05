<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transect', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->string('client_timestamp')->unique(); //datetime
			$table->integer('dig_id')->unsigned();
			$table->string('note', 150);
			$table->double('start_latitude');
			$table->double('start_longitude');
			$table->double('start_accuracy');
			$table->double('end_latitude');
			$table->double('end_longitude');
			$table->double('end_accuracy');
			//$table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transect');
	}

}
