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
		$usr->message = 'Hello, I am a';
		$usr->privilege = 0; // An unverified user.
		$usr->save();
		
		$usr = new User;
		$usr->username = 'b';
		$usr->password = Hash::make('b');
		$usr->email = 'b@b.com';
		$usr->message = 'Hello, I am b';
		$usr->privilege = 1; // An verified user.
		$usr->save();	
		
		$usr = new User;
		$usr->username = 'c';
		$usr->password = Hash::make('c');
		$usr->email = 'c@c.com';
		$usr->message = 'Hello, I am c';
		$usr->privilege = 2; // An administrative user.
		$usr->save();	
		
	}

}
