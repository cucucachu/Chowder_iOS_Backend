<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('digs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('client_timestamp');
			$table->string('name');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			
			$table->unique(array('user_id', 'client_timestamp'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('digs');
	}

}
