<?php
	class Template {

		private $page;
		private $data;		

		private function RetrieveHTML($file) {
			// get the html from the template files,
			// also checks to make sure the template
			// exists.
		}

		// input: $page = String: what page to load
		// input: $data = Array: infomration from the model.
		// output: Returns the constructed view to be displayed.
		public function consolidate($page, $data) {
			$this->page = (string) $page;
			$this->data = (array) $data;

			// code to take the data from the $data array
			// and inject it into the template before
			// sending it out as something to be displayed.
		}

		public function display() {

		}
	}
?>
