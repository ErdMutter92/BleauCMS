<?php

	class Template {

		private $location;
		private $contents = array();
		private $nav;
		private $menu;
		private $post;

		public function __construct($templateDir) {
			$this->location = $templateDir;
			$this->parseTemplate(array("html", "css"));
		}

		private function parseTemplate(array $allowedExtensions) {
			// opens the template directory and takes the contents
			// of the files in that directory adding them to an array.
			if ($handle = opendir($this->location)) {
				while (false !== ($entry = readdir($handle))) {
					$fileExtension = pathinfo($entry)['extension'];
					$fileContent = file_get_contents($this->location.$entry);

					// Only allows files with the extensions located in
					// array $allowedExtensions to be added to contents array.
					if (false !== array_search($fileExtension, $allowedExtensions)) {
						$this->contents[$fileExtension] = $fileContent;
					}
				}
			}

			// sets the post value to the contents between the two html comments.
			$this->setPost($this->getElement('ARTICLE'));
			$this->setNav($this->getElement('NAV'));
			$this->setMenu($this->getElement('MENU'));

		}

		private function getElement($item) {
			$startTag = '<!-- START ' . $item . '_ITEM -->';
			$endTag = '<!-- END ' . $item . '_ITEM -->';
			$element = split($startTag, split($endTag, $this->contents['html'])[0])[1];

			// remove element tags from html along with the element.
			$this->contents['html'] = str_replace($startTag.$element.$endTag, '', $this->contents['html']);

			return $element;
		}

		private function setPost($html) {
			$this->post = $html;
		}

		public function getPost() {
			return $this->post;
		}
		
		private function setMenu($html) {
			$this->menu = $html;
		}

		public function getMenu() {
			return $this->menu;
		}

		private function setNav($html) {
			$this->nav = $html;
		}

		public function getNav() {
			return $this->nav;
		}

		public function setLocaton($location) {
			$this->location = $location;
		}

		public function getLocation() {
			return $this->location;
		}

		public function getHTMLContents() {
			return $this->contents['html'];
		}


	}

?>
