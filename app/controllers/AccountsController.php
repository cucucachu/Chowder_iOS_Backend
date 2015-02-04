<?php
	
class AccountsController extends BaseController {
	
	public function sign_up() {
		$usr = new User;
		$usr->username = Input::get('username');
		$usr->password = Hash::make(Input::get('password'));
		$usr->save();
	}
	
	public function login() {
		$username = Input::get('username');
		$password = Input::get('password');
		$msg = "Logged in!";

		
		$user = User::where('username', '=', $username)->get();
		
		if ($user == NULL) {
			$msg = "Unknown User";
		}
		/*
		else {
			if (!Hash::check($password, $user->password)) {
				$msg = "Password Incorrect";
			}
		}*/
		$view = View::make('all');
		$view->msg = $msg;
		return $view;
	}
}
	
?>