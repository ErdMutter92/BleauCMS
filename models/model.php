<?php
	require('./models/CSV.php');

	class Model {

		private $locations;
		private $requestedData;
		private $daoMap = array (
			"currentBlogData" => "currentBlogData"
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

		private function currentBlogData() {
			$this->requestedData = array ("Tags" => array ("{?template_root?}" => "./views/templates/Starry Night/"));
		}

		private function send() {
			return $this->requestedData;
		}

	}
?>
