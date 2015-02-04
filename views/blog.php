<?php

	class Blog {
		
		public $html;

		public function template($dir) {
			if (is_dir($dir)) {
				if ($loc = opendir($dir)) {
					//echo readdir($dir);
					while (($file = readdir($loc)) !== False) {
						if (explode('.', $file)[1] == 'html') {
							$this->html[$file] = file_get_contents($dir.$file);
						} elseif (explode('.', $file)[1] == 'css') {
							$this->html[$file] = file_get_contents($dir.$file);
						}
					}
				}
			}
		}

		public function parseHTML($template, $style) {
			$startHTML = explode('</head>', $this->html[$template])[0];
			$endHTML = explode('</head>', $this->html[$template])[1];
			$this->html = $startHTML. "<style>" . $this->html[$style] . "</style></head>". $endHTML;
		}
		
		public function getHTML() {
			return $this->html;
		}

		public function setHTML(Tags $tags) {
			$this->html = $tags->getHTML();
		}
		
		public function display() {
			echo $this->html;
		}

	}

?>
