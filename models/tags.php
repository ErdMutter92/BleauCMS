<?php

	class Tag {

		private $tag;
		private $symble;
		private $contents;

		public function __construct($tag, $symble, $contents) {
			$this->tag = $tag;
			$this->symble = $symble;
			$this->contents = $contents;
		}

		public function setTag($tag) {
			$this->tag = $tag;
		}

		public function setSymble($symble) {
			$this->symble = $symble;
		}

		public function setContents($contents) {
			$this->contents = $contents;
		}

		public function getTag($tag) {
			return $this->tag;
		}

		public function getSymble($symble) {
			return $this->symble;
		}

		public function getContents($contents) {
			return $this->contents;
		}
	}

?>
