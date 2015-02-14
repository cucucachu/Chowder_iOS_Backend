<?php
	
class AccountsController extends BaseController {
	
	public function new() {
		$usr = new User;
		$usr->username = Input::get('username');
		$usr->password = Hash::make(Input::get('password'));
		$usr->save();
	}
	
	public function newView() {
		return View::make('signup');
	}
	
	
	
	public function login() {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			echo "login";
			
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
	
	public function login_device() {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			echo "login";
			
			if (Auth::attempt(array('username' => $username, 'password' => $password)))
			{
				return "Logged in";
			}
			else {
				return = "Username and/or Password is incorrect";
			}
		}
	}
	
	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	public function loginView() {
		return View::make('login');
	}
}
	
?>