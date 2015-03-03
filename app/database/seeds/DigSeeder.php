<?php

class DigSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = User::where('username', '=', 'b')->first();
		
		$dig = new Dig;
		$dig->client_timestamp = 'time 0';
		$dig->name = 'Test Dig';
		$dig->user_id = $user->id;
		$dig->save();
		
		$transect = new Transect;
		$transect->client_timestamp = 'time 0';
		$transect->dig_id = $dig->id;
		$transect->start_latitude = '0';
		$transect->start_longitude = '0';
		$transect->start_accuracy = '0';
		$transect->end_latitude = '0';
		$transect->end_longitude = '0';
		$transect->end_accuracy = '0';
		$transect->save();
		
		$clam = new Clam;
		$clam->client_timestamp = 'time 0';
		$clam->transect_id = $transect->id;
		$clam->size = 17;
		$clam->section_number = 0;
		$clam->message = "This is the first test clam.";
		$clam->latitude = '0';
		$clam->longitude = '0';
		$clam->accuracy = '0';
		$clam->save();
		
	}

}
