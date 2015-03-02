<?php

class Clam extends Eloquent {
	
	public function transect() {
		return $this->belongsTo('Transect');
	}
	
	public function user() {
		return $this->transect->dig->user;
	}

}

?>
