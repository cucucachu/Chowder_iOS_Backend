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
		
		DB::table('clam')->delete();
		DB::table('transect')->delete();
		DB::table('dig')->delete();
		DB::table('user_ios')->delete();
		DB::table('user_info')->delete();


		$this->call('UserTableSeeder');
		$this->call('DigSeeder');
	}

}
