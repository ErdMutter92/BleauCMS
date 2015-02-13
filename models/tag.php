<?php

	class Tag {

		private $id;
		private $tag;
		private $symble;
		private $contents;

		public function __construct($id, $tag, $symble, $contents) {
			$this->id = $id;
			$this->tag = $tag;
			$this->symble = $symble;
			$this->contents = $contents;
		}

		public function setID($id) {
			$this->id = $id;
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

		public function getID() {
			return $this->id;
		}

		public function getTag() {
			return $this->tag;
		}

		public function getSymble() {
			return $this->symble;
		}

		public function getContents() {
			return $this->contents;
		}
	}

?>
