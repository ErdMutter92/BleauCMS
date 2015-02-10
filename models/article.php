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

		public function setArticleID($id) {
			$this->id = $id;
		}

		public function setArticleTitle($title) {
			$this->title = $title;
		}
		
		public function setArticleBody($body) {
			$this->body = $body;
		}

		public function setArticleAuthor($author) {
			$this->author = $author;
		}

		public function setArticleTimestamp($timestamp) {
			$this->timestamp = $timestamp;
		}

		public function setArticle($id, $title, $body, $author, $timestamp) {
			$this->id = $id;
			$this->title = $title;
			$this->body = $body;
			$this->author = $author;
			$this->timestamp = $timestamp;
		}
		
		public function returnArticle() {
			return $this->article;
		}
	
	}


?>
