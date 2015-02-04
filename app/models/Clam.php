<?php

class Clam extends Eloquent {
	
	public function section() {
		return $this->belongsTo('Section');
	}
	
	public function user() {
		return $this->belongsTo('User');
	}

}

?>
