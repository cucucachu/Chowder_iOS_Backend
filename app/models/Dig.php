<?php

class Dig extends Eloquent {
	
	protected $table = 'dig';
	public $timestamps = false;
	
	public function transects() {
		return $this->hasMany('Transect');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}

}

?>
