<?php
	class Tags extends CSV {

		private $tags;
		private $html;

		public function __construct(Blog $blog, $file) {
			$this->html = $blog->getHTML();
			$this->read($file, '|');
			$this->tags = $this->returnArray();
			foreach ($this->tags as $key => $item) {
				$term = "{". $item[1] . $item[0] . $item[1] . "}";
				$meaning = $item[2];
				$this->html = str_replace($term, $meaning, $this->html);
			}
		}

		public function getTags() {
			return $this->tags;
		}

		public function getHTML() {
			return $this->html;
		}

		private function registerTag($tag, $resource, $override = False) {
			if ((!isset($this->tags[$tag])) || ($override == True)) {
				$this->tags[$tag] = $resource;
			}
		}

		private function deregisterTag($tag) {
			unset($this->tags[$tag]);
		}
	
	}
?>
