<?php
/********************************************************

   Title: model
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: Acts as a database abstraction layer,
		in the event of a change in database
		formating, only this will need to
		change, instead of the entire program.


********************************************************/
	require('./models/csv.php');

	class Model {

		private $locations;
		private $requestedData;
		private $daoMap = array (
			"currentBlogData" => "currentBlogData",
			"error404Data" => "error404Data"
		);
		private $allowedTypes = array ("array");

		// INPUT: (string) $requestedObject: a string containging function
		//				     name to be called.
		// INPUT: (string) $returnDataType: a data format allowed from
		//			            $allowedTypes (defualt: array)
		// OUTPUT: returns data in format requested, if failed returns FALSE
		public function request($requestedObject, $returnDateType = 'array') {
			if (array_key_exists($requestedObject, $this->daoMap)) {
				$this->$requestedObject();
				return $this->send();
			} else {
				return FALSE;
			}
		}

		private function genTagsArray($file, $delimiter) {
			$CSVTags = new CSV($file, $delimiter);
			$tmpArray = array( "Tags" => NULL );
			foreach ($CSVTags->returnArray() as $key => $item) {
				$tmpArray["Tags"][$item[0]] = $item[1];
			}
			return $tmpArray;
		}

		// INPUT: (int) $startID: index of first post to grab.
		// INPUT: (int) $endID: index of last post to grab.
		// OUTPUT: (array) $data: array containing post data.
		// gets the posts from the database starting from
		// $startID to $endID, where $endID >= $startID.
		private function getPosts($startID, $endID) {
			if (((int) $startID) <= ((int) $endID)) {
				// code :D
			}
		}

		private function currentBlogData() {
			$this->requestedData = $this->genTagsArray('./data/index/Tags/tags.csv', ', ');
		}

		private function error404Data() {
			$this->requestedData = $this->genTagsArray('./data/error/Tags/404tags.csv', ', ');
		}
	
		private function send() {
			return $this->requestedData;
		}

	}
?>
