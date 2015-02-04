<?php

class TransectAndSectionSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$usr = User::where('username', '=', 'a')->first();
		
		$t = new Transect;
		$t->user_id = $usr->id;
		$t->save();
		
		$s = new Section;
		$s->transect_id = $t->id;
		$s->save();
		
	}

}
