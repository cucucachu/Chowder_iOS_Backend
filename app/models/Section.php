<?php

class Section extends Eloquent {
	
	public function transect() {
		return $this->belongsTo('Transect');
	}
	
	public function clams() {
		return $this->hasMany('Clam');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}

}

?>
