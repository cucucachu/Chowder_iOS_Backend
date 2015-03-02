<?php

class Dig extends Eloquent {
	
	public function transects() {
		return $this->hasMany('Transect');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}

}

?>
