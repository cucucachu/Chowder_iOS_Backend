<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_info', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->string('message'); 
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
		Schema::dropIfExists('user_ios');
		Schema::dropIfExists('user_info');
	}

}
