<?php

	class Article {

		public $id;
		public $title;
		public $body;
		public $author;
		public $timestamp;

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
	
	}


?>
