<?php

	class Article {

		private $id;
		private $title;
		private $body;
		private $author;
		private $timestamp;

		public function __construct($id, $title, $body, $author, $timestamp) {
			$this->id = $id;
			$this->title = $title;
			$this->body = $body;
			$this->author = $author;
			$this->timestamp = $timestamp;
		}

		public function setID($id) {
			$this->id = $id;
		}

		public function setTitle($title) {
			$this->title = $title;
		}
		
		public function setBody($body) {
			$this->body = $body;
		}

		public function setAuthor($author) {
			$this->author = $author;
		}

		public function setTimestamp($timestamp) {
			$this->timestamp = $timestamp;
		}

		public function setArticle($id, $title, $body, $author, $timestamp) {
			$this->id = $id;
			$this->title = $title;
			$this->body = $body;
			$this->author = $author;
			$this->timestamp = $timestamp;
		}

		public function getID() {
			return $this->id;
		}

		public function getTitle() { 
			return $this->title;
		}

		public function getBody() { 
			return $this->body;
		}

		public function getAuthor() { 
			return $this->author;
		}

		public function getTimestamp() { 
			return $this->timestamp;
		}

	
	}


?>
