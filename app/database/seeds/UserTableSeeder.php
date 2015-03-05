<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user_info = new UserInfo;
		$user_info->username = 'a';
		$user_info->firstname = 'a';
		$user_info->lastname = 'a';
		$user_info->email = 'a@a.com';
		$user_info->message = 'Hello, I am a';
		$user_info->save();
	
		$usr = new User;
		$usr->username = 'a';
		$usr->password = Hash::make('a');
		$usr->email = 'a@a.com';
		$usr->message = 'Hello, I am a';
		$usr->privilege = 0; // An unverified user.
		$usr->user_info_id = $user_info->id;
		$usr->save();
		
		$user_info = new UserInfo;
		$user_info->username = 'b';
		$user_info->firstname = 'b';
		$user_info->lastname = 'b';
		$user_info->email = 'b@b.com';
		$user_info->message = 'Hello, I am b';
		$user_info->save();
		
		$usr = new User;
		$usr->username = 'b';
		$usr->password = Hash::make('b');
		$usr->email = 'b@b.com';
		$usr->message = 'Hello, I am b';
		$usr->privilege = 1; // An verified user.
		$usr->user_info_id = $user_info->id;
		$usr->save();	
		
		$user_info = new UserInfo;
		$user_info->username = 'c';
		$user_info->firstname = 'c';
		$user_info->lastname = 'c';
		$user_info->email = 'c@c.com';
		$user_info->message = 'Hello, I am c';
		$user_info->save();
		
		$usr = new User;
		$usr->username = 'c';
		$usr->password = Hash::make('c');
		$usr->email = 'c@c.com';
		$usr->message = 'Hello, I am c';
		$usr->privilege = 2; // An administrative user.
		$usr->user_info_id = $user_info->id;
		$usr->save();	
		
	}

}
