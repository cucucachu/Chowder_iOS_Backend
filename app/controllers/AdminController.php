<?php

class AdminController extends BaseController {
		
	public function index() {
		return View::make('admin.index');
	}
		
	public function newUsers() {
		$view = View::make('admin.newUsers');
		$users = User::where('privilege', '=', '0')->get();
		$view->users = $users;
		return $view;
	}
	
	public function approveUser($id) {
		$user = User::find($id);
		$user->privilege = 1;
		$user->save();
		return $this->newUsers();
	}
	
	public function rejectUser($id) {
		$user = User::find($id);
		$user->delete();
		return $this->newUsers();
	}
	
	public function clamCSV() {
		$clams = Clam::all();
		$csv = "ID, Lat, Long, Width";
		
		foreach ($clams as $clam) {
			$csv = $csv."<br>\n";
			$csv = $csv."".$clam->id;
			$csv = $csv.", ".$clam->latitude;
			$csv = $csv.", ".$clam->longitude;
			$csv = $csv.", ".$clam->width;
		}
		
		return $csv;
	}
}

?>