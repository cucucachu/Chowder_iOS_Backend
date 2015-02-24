<?php
	
class UploadController extends BaseController {
	
	public function upload() {
		$overwrite = false;
		
		$transects = Input::get('transects');
		

		foreach($transects as $transect_json) {
			
			$existing = Transect::where('UUID', '=', '1')
				->where('client_timestamp', '=', $transect_json['device_created_at'])->first();
			
			
			if ($existing != NULL) {
				$transect = $existing;
			}
			else {
				$transect = new Transect;
				$transect->UUID = 1; // should come from $transect_json['UUID']
				$transect->client_timestamp = $transect_json['device_created_at'];
				$transect->user_id = 1; // should come from login info
			}
			
			// should check that coordinates is in <lat,long,acc> format.
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
			
			foreach($transect_json['sections'] as $section_json) {
				$existing = Section::where('transect_id', '=', $transect->id)
					->where('UUID', '=', $transect->UUID)
					->where('client_timestamp', '=', $section_json['device_created_at'])->first();
				
				
				if ($existing != NULL) {
					$section = $existing;
				}
				else {
					$section = new Section;
					$section->client_timestamp = $section_json['device_created_at'];
					$section->UUID = $transect->UUID;
					$section->transect_id = $transect->id;
				}
							
				$coordinates = explode(',', $section_json['coordinates']);
		
				$section->latitude = $coordinates[0];
				$section->longitude = $coordinates[1];
				$section->accuracy = $coordinates[2];
				
				try {
					$section->save();
				}
				catch (Exception $ex) {
					echo "Exception caught while saving section.<br>";
					echo $ex;
				}
				foreach($section_json['clams'] as $clam_json) {
					$existing = Clam::where('section_id', '=', $section->id)
						->where('UUID', '=', $transect->UUID)
						->where('client_timestamp', '=', $clam_json['device_created_at'])->first();
				
					if ($existing != NULL) {
						$clam = $existing;
					}
					else {
						$clam = new Clam;
						$clam->section_id = $section->id;
						$clam->UUID = $transect->UUID;
						$clam->client_timestamp = $clam_json['device_created_at'];
					}
					$clam->size = $clam_json['size'];
					
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
	}
	
	public function delete() {		
		$transects = Input::get('transects');
		
		foreach($transects as $transect_json) {
			
			$transect = Transect::where('UUID', '=', '1')
				->where('client_timestamp', '=', $transect_json['device_created_at'])->first();

			foreach($transect->sections as $section) {
				foreach($section->clams as $clam) {
					try {
						$clam->delete();
					}
					catch (Exception $ex) {
						echo("Could not delete clam #".$clam->id.". Exception: ".$ex->getMessage());
					}
				}
				
				try {
					$section->delete();
				}
				catch (Exception $ex) {
					echo("Could not delete section #".$section->id.". Exception: ".$ex->getMessage());
				}
				
			}
			
			try {
				$transect->delete();
			}
			catch (Exception $ex) {
				echo("Could not delete transect. Exception: ".$ex->getMessage());
			}
		}
		
		$this->upload();
	}
	
	public function test() {
		
		$clam = new Clam;
		$clam->client_timestamp = "time".rand(0, 100000000);
		$clam->section_id = 1;
		$clam->size = 1;
		$clam->save();
		return "New clam ".$clam->id;
	}
}
	
?>
