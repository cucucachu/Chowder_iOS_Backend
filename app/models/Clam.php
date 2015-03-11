<?php

class Clam extends Eloquent {
	
	protected $table = 'clam';
	protected $primaryKey = array('id', 'transect_id');
	public $timestamps = false;
	
	public function transect() {
		return $this->belongsTo('Transect');
	}
	
	public function user() {
		return $this->transect->dig->user;
	}

}

?>
