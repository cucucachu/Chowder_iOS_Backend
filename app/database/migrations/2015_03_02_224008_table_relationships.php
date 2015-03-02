<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clams', function($table)
		{
			$table->foreign('transect_id')->references('id')->on('transects');
		});
		
		Schema::table('transects', function($table)
		{
			$table->foreign('dig_id')->references('id')->on('digs');
		});
		
		Schema::table('digs', function($table)
		{
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
