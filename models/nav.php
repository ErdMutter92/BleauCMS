<?php

	class Nav {

		private $id;
		private $text;
		private $url;
		private $target;

		public function __construct($id, $text, $url, $target) {
			$this->id = $id;
			$this->text = $text;
			$this->url = $url;
			$this->target = $target;
		}

		public function setID($id) {
			$this->id = $id;
		}

		public function setText($text) {
			$this->text = $text;
		}

		public function setURL($url) {
			$this->url = $url;
		}

		public function setTarget($target) {
			$this->target = $target;
		}

		public function getID() {
			return $this->id;
		}

		public function getText() {
			return $this->text;
		}

		public function getURL() {
			return $this->url;
		}

		public function getTarget() {
			return $this->target;
		}

	}

?>
