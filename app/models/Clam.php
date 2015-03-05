<?php

class Clam extends Eloquent {
	
	protected $table = 'clam';
	public $timestamps = false;
	
	public function transect() {
		return $this->belongsTo('Transect');
	}
	
	public function user() {
		return $this->transect->dig->user;
	}

}

?>
