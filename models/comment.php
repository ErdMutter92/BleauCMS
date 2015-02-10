<?php

	class Comment {

		public $id;
		public $articleID;
		public $title;
		public $author;
		public $emailAddress;
		public $body;
		public $timestamp;

		public function __construct($id, $title, $body, $author, $timestamp, $articleID, $emailAddress) {
			$this->id = $id;
			$this->title = $title;
			$this->body = $body;
			$this->author = $author;
			$this->timestamp = $timestamp;
			$this->articleID = $articleID;
			$this->emailAddress = $emailAddress;
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

		public function setArticleID($articleID) {
			$this->articleID = $articleID;
		}

		public function setEmailAddress($emailAddress) {
			$this->emailAddress = $emailAddress;
		}
	}

?>
