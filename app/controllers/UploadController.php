<?php
	
class UploadController extends BaseController {
	
	public function upload() {
		$overwrite = false;
		
		$client_timestamp = Input::get('device_created_at');
		
		$existing = Dig::where('user_id', '=', Auth::id())
			->where('client_timestamp', '=', $client_timestamp)->first();
		
		if ($existing != NULL) 
			$dig = $existing;
		else
			$dig = new Dig;
		
		$dig->client_timestamp = $client_timestamp;
		$dig->name = Input::get('name');
		$dig->user_id = Auth::id();
		
		try {
			$dig->save();
		}
		catch (Exception $ex) {
			echo "Exception caught while saving dig.<br>";
			echo $ex;
		}
		
		$transects = Input::get('transects');
		
		foreach($transects as $transect_json) {
			
			$existing = Transect::where('dig_id', '=', $dig->id)
				->where('client_timestamp', '=', $transect_json['device_created_at'])->first();
			
			if ($existing != NULL) {
				$transect = $existing;
			}
			else {
				$transect = new Transect;
			}

			$transect->client_timestamp = $transect_json['device_created_at'];
			$transect->dig_id = $dig->id;
			
			$coordinates = explode(',', $transect_json['coordinates']);
			
			$transect->latitude = $coordinates[0];
			$transect->longitude = $coordinates[1];
			$transect->accuracy = $coordinates[2];
			
			try {
				$transect->save();
			}
			catch (Exception $ex) {
				echo "Exception caught while saving transect.<br>";
				echo $ex;
			}
			
			foreach($transect_json['clams'] as $clam_json) {
				$existing = Clam::where('transect_id', '=', $transect->id)
					->where('client_timestamp', '=', $clam_json['device_created_at'])->first();
			
				if ($existing != NULL) {
					$clam = $existing;
				}
				else {
					$clam = new Clam;
				}
				
				$clam->client_timestamp = $clam_json['device_created_at'];
				$clam->transect_id = $transect->id;
				$clam->section_number = $clam_json['sectionNumber'];
				$clam->size = $clam_json['size'];
				$clam->message = $clam_json['note'];
			
				$coordinates = explode(',', $clam_json['coordinates']);
			
				$clam->latitude = $coordinates[0];
				$clam->longitude = $coordinates[1];
				$clam->accuracy = $coordinates[2];
				
				try {
					$clam->save();
				}
				catch (Exception $ex) {
					echo "Caught exception when saving clam.<br>";
					echo $ex;
				}
			}
		}
	}
	
	public function delete() {
		$client_timestamp = Input::get('device_created_at');
		
		$dig = Dig::where('user_id', '=', Auth::id())
			->where('client_timestamp', '=', $client_timestamp)->first();
		
		if ($dig == NULL) 
			return "Could not delete";
		
		
		foreach($dig->transects as $transect) {
			foreach($transect->clams as $clam) {
				$clam->delete();
			}
			$transect->delete();
		}
		
		$dig->delete();
		
		$this->upload();
	}
	
	public function test() {
		
		$clam = new Clam;
		$clam->client_timestamp = "time".rand(0, 100000000);
		$clam->transect_id = 1;
		$clam->size = 1;
		$clam->save();
		return "New clam ".$clam->id;
	}
}
	
?>
