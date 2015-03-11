<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clam', function($table)
		{
			$table->foreign('transect_id')->references('id')->on('transect');
		});
		
		Schema::table('transect', function($table)
		{
			$table->foreign('dig_id')->references('id')->on('dig');
		});
		
		Schema::table('dig', function($table)
		{
			$table->foreign('user_id')->references('id')->on('user');
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
