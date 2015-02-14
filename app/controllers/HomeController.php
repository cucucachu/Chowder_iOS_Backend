<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('home');
	}

	public function loginView() {
		return View::make('login');
	}

}
