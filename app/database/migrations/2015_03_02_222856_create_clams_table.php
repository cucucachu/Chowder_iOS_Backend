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
		Schema::create('clam', function(Blueprint $table) 
		{
			$table->integer('id')->usnigned();
			$table->dateTime('client_timestamp')->unique();
			$table->integer('transect_id')->unsigned();
			$table->integer('section_number');
			$table->double('width')->unsigned();//was 'size'
			$table->string('note', 150);
			$table->double('latitude');
			$table->double('longitude');
			$table->double('accuracy');
			
			$table->primary(array('transect_id', 'id'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('clam');
	}

}
