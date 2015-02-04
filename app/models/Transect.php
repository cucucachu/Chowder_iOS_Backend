<?php

class Transect extends Eloquent {
	
	public function sections() {
		return $this->hasMany('Section');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}

}

?>
