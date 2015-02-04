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
		Schema::create('transects', function(Blueprint $table) 
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('UUID');
			$table->string('client_timestamp');
			$table->double('latitude');
			$table->double('longitude');
			$table->double('accuracy');
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
		Schema::dropIfExists('transects');
	}

}
