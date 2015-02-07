<?php
	class Template {

		private $template;
		private $templateDir = './views/templates/';
		private $data;
		private $templateFiles;

		private $templateExtensions = array ("html", "css");

		private $templateMap = array (
			"index" => "Starry Night/",
			"error404" => "Starry Night/"
		);
	
		private function fetchTemplateContents() {
			if ($handle = opendir($this->templateDir.$this->templateMap[$this->template])) {
				while (false !== ($entry = readdir($handle))) {

					// Only gets file contents for files in the dir
					// which have a file extension found in $templateExtensions
					if (false !== array_search(pathinfo($entry)['extension'], $this->templateExtensions)) {
						$this->templateFiles[pathinfo($entry)['extension']] = 
							file_get_contents($this->templateDir.
								$this->templateMap[$this->template]
									.$entry);

					}

				}
			}
		}

		// input: $page = String: what page to load
		// input: $data = Array: infomration from the model.
		// output: Returns the constructed view to be displayed.
		public function consolidate($template, $data) {
			$this->template = (string) $template;
			$this->data = (array) $data;
			$this->fetchTemplateContents();
			
			// code to take the data from the $data array
			// and inject it into the template before
			// sending it out as something to be displayed.
		}

		public function display() {
			
		}
	}
?>
