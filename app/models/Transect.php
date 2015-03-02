<?php

class Transect extends Eloquent {
	
	public function clams() {
		return $this->hasMany('Clam');
	}
	
	public function dig() {
		return $this->belongsTo('Dig');
	}
	
	public function user() {
		return $this->dig->user;
	}

}

?>
