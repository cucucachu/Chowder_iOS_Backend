<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$usr = new User;
		$usr->username = 'a';
		$usr->password = Hash::make('a');
		$usr->email = 'a@a.com';
		$usr->save();
		
		$usr = new User;
		$usr->username = 'b';
		$usr->password = Hash::make('b');
		$usr->email = 'b@b.com';
		$usr->save();	
		
	}

}
