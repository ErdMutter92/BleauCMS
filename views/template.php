<?php
/********************************************************

   Title: template
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: The brains behind the template system,
		accepts data and the template name then
		returns the view back.


********************************************************/
	class Template {

		private $template;
		private $templateDir = './views/templates/';
		private $article;
		private $templateFiles;
		private $tags;

		private $templateExtensions = array ("html", "css");

		private $templateMap = array (
			"index" => "Starry Night/",
			"blog" => "Starry Night/",
			"error404" => "Starry Night/"
		);

		private $dataHandlers = array ("Tags");
	
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
				closedir($handle);
			}
		}

		// input: $page = String: what page to load
		// input: $data = Array: infomration from the model.
		// output: Returns the constructed view to be displayed.
		public function consolidate($template, $article, $tags) {
			$this->template = (string) $template;
			$this->fetchTemplateContents();

			$this->article = $article;
			$this->tags = $tags;

			// Code to be written.
			
		}

		// Takes the TAGS sub array from the data passed
		// from the controller and replaces the tags
		// in the template html.
		private function handleTags($data) {
			foreach ($data as $key => $item) {
				$this->templateFiles['html'] = str_replace($key, $item, $this->templateFiles['html']);
			}
		}

		public function display() {
			echo $this->templateFiles['html'];
		}
	}
?>
