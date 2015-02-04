<?php

class DisplayController extends BaseController {

	public function show_all() {
		$view = View::make('all');
		$view->transects = Transect::all();
		return $view;
	}
	
	public function ticker() {
		$view = View::make('ticker');
		return $view;
	}
	
	public function latest() {
		$view = View::make('latest');
		$view->transects = Transect::all()->sortBy('updated_at')->take(10);
		
		return $view;
	}

}

?>
