<?php

	class Menu {

		private $id;
		private $header;
		private $body;

		public function __construct($id, $header, $body) {
			$this->id = $id;
			$this->header = $header;
			$this->body = $body;
		}

		public function setID($id) {
			$this->id = $id;
		}

		public function setHeader($header) {
			$this->header = $header;
		}

		public function setBody($body) {
			$this->body = $body;
		}

		public function getID() {
			return $this->id;
		}

		public function getHeader() {
			return $this->header;
		}

		public function getBody() {
			return $this->body;
		}
	}

?>
