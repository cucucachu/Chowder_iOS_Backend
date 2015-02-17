<?php
	
class AccountsController extends BaseController {
	
	public function new_account() {
		
		if (strcmp(Input::get('password'), Input::get('password_again')) != 0)
			return "Your passwords do not match";
		
		try {
			$usr = new User;
			$usr->username = Input::get('username');
			$usr->password = Hash::make(Input::get('password'));
			
			$usr->save();
		}
		catch (Exception $ex) {
			return "Could not create user ".$usr->username."<br>".$ex->getMessage();
		}
		
		return Redirect::to("/");
	}
	
	public function new_view() {
		return View::make('signup');
	}
	
	public function login() {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if (Auth::attempt(array('username' => $username, 'password' => $password)))
			{
				return Redirect::action('DisplayController@ticker');
			}
			else {
				$view = View::make('login');
				$view->msg = "Username and/or Password is incorrect";
				return $view;
			}
		}
	}
	
	public function login_app() {
		$username = Input::get('username');
		$password = Input::get('password');
		
		if (Auth::attempt(array('username' => $username, 'password' => $password)))
			return "true";
		
		return "false";
	}
	
	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	public function login_view() {
		return View::make('login');
	}
}
	
?>