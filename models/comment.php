<?php

	class Comment {

		private $id;
		private $articleID;
		private $title;
		private $author;
		private $emailAddress;
		private $body;
		private $timestamp;

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

		public function getArticleID() {
			return $this->articleID;
		}

		public function getEmailAddress() {
			return $this->emailAddress;
		}
	}

?>
