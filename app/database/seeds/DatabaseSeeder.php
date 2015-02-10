<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('sections')->delete();
		DB::table('transects')->delete();
		DB::table('users')->delete();


		$this->call('UserTableSeeder');
		$this->call('TransectAndSectionSeeder');
	}

}
