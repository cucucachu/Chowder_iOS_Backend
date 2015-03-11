<?php
	
class UploadController extends BaseController {
	
	public function upload() {
		$overwrite = false;
		
		$client_timestamp = DATE('Y-m-d H:i:s', strtotime(Input::get('device_created_at')));
		
		$existing = Dig::where('user_id', '=', Auth::id())
			->where('client_timestamp', '=', $client_timestamp)->first();
		
		if ($existing != NULL) 
			$dig = $existing;
		else
			$dig = new Dig;
		
		$dig->client_timestamp = $client_timestamp;
		$dig->name = Input::get('name');
		$dig->note = Input::get('note');
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
			
			$client_timestamp = DATE('Y-m-d H:i:s', strtotime($transect_json['device_created_at']));
			
			$existing = Transect::where('dig_id', '=', $dig->id)
				->where('client_timestamp', '=', $client_timestamp)->first();
			
			if ($existing != NULL) {
				$transect = $existing;
			}
			else {
				$transect = new Transect;
			}

			$transect->client_timestamp = $client_timestamp;
			$transect->dig_id = $dig->id;
			$transect->note = $transect_json['note'];
			
			$coordinates = explode(',', $transect_json['coordinates']);
			
			$transect->start_latitude = $coordinates[0];
			$transect->start_longitude = $coordinates[1];
			$transect->start_accuracy = $coordinates[2];
			
			try {
				$coordinates = explode(',', $transect_json['endCoordinates']);
			
				$transect->end_latitude = $coordinates[0];
				$transect->end_longitude = $coordinates[1];
				$transect->end_accuracy = $coordinates[2];
			}
			catch (Exception $ex) {
				//end Coordinates not yet set
			}
			
			try {
				$transect->save();
			}
			catch (Exception $ex) {
				echo "Exception caught while saving transect.<br>";
				echo $ex;
			}
			
			$clam_number = 1;
			
			// Delete old clams to avoid database collisions
			foreach($transect_json['clams'] as $clam_json) {
			
				$client_timestamp = DATE('Y-m-d H:i:s', strtotime($clam_json['device_created_at']));
				
				$existing = Clam::where('transect_id', '=', $transect->id)
					->where('client_timestamp', '=', $client_timestamp)->first();
			
				if ($existing != NULL) {
					DB::unprepared('DELETE FROM clam where (transect_id, id) IN (('.$existing->transect_id.', '.$existing->id.'));');
				}
			}
			
			// Add all clams
			foreach($transect_json['clams'] as $clam_json) {
			
				$client_timestamp = DATE('Y-m-d H:i:s', strtotime($clam_json['device_created_at']));
				
				$existing = Clam::where('transect_id', '=', $transect->id)
					->where('client_timestamp', '=', $client_timestamp)->first();
			
				if ($existing != NULL) {
					$clam = $existing;
				}
				else {
					$clam = new Clam;
				}
				
				$clam->id = $clam_number++;
				
				$clam->client_timestamp = $client_timestamp;
				$clam->transect_id = $transect->id;
				$clam->section_number = $clam_json['sectionNumber'];
				$clam->width = $clam_json['size'];
				$clam->note = $clam_json['note'];
			
				$coordinates = explode(',', $clam_json['coordinates']);
			
				$clam->latitude = $coordinates[0];
				$clam->longitude = $coordinates[1];
				$clam->accuracy = $coordinates[2];
				
				try {
					//$clam->save();
					$query = 'INSERT INTO clam (id, client_timestamp, transect_id, section_number, width, note, latitude, longitude, accuracy) VALUES (\''.$clam->id.'\',
						\''.$clam->client_timestamp.'\', \''.$clam->transect_id.'\', \''.$clam->section_number.'\', \''.$clam->width.'\', \''.$clam->note.'\', 
						\''.$clam->latitude.'\', \''.$clam->longitude.'\', \''.$clam->accuracy.'\');';
					DB::unprepared($query);
				}
				catch (Exception $ex) {
					echo "Caught exception when saving clam.<br>";
					echo $ex;
				}
			}
		}
	}
	
	public function delete() {
		$client_timestamp = DATE('Y-m-d H:i:s', strtotime(Input::get('device_created_at')));;
		
		$dig = Dig::where('user_id', '=', Auth::id())
			->where('client_timestamp', '=', $client_timestamp)->first();
		
		if ($dig == NULL) 
			return "Could not delete";
		
		
		foreach($dig->transects as $transect) {
			foreach($transect->clams as $clam) {
				//$clam->delete();
				DB::unprepared('DELETE FROM clam where (transect_id, id) IN (('.$clam->transect_id.', '.$clam->id.'));');
				echo("!!!!!!!!!!!!!Deleting clam $clam->transect_id\-$clam->id");
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
