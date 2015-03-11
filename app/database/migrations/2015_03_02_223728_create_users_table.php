<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->integer('privilege')->unsigned();
			$table->string('message'); //Move to user_info
			$table->string('remember_token', 100);
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
		Schema::dropIfExists('transect');
		Schema::dropIfExists('dig');
		Schema::dropIfExists('user');
	}

}
