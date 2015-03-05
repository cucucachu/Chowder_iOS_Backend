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
		
		$digs = Dig::all();
		$digs = $digs->sortByDesc(function($model) {
			return $model->id;
		});
		
		$view->digs = $digs->take(10);
		
		return $view;
	}

}

?>
