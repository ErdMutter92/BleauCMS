<?php

	class Article {

		public $article['id'];
		public $article['title'];
		public $article['body'];
		public $article['author'];
		public $article['timestamp'];

		public function __construct($id) {
			$this->searchByID($id);
		}

		public function getArticle($id) {
			// code to get the article from the database
			// using $id as an index.
		}

		// Saves the current variables in the array article
		// to the database medium using ID as primary key.
		public function saveArticle() {
			// code to save the article
		}

		public function setArticleID($id) {
			$this->article['id'] = $id;
		}

		public function setArticleTitle($title) {
			$this->article['title'] = $title;
		}
		
		public function setArticleBody($body) {
			$this->article['body'] = $body;
		}

		public function setArticleAuthor($author) {
			$this->article['author'] = $author;
		}

		public function setArticleTimestamp($timestamp) {
			$this->article['timestamp'] = $timestamp;
		}

		public function setArticle($id, $title, $body, $author, $timestamp) {
			$this->article['id'] = $id;
			$this->article['title'] = $title;
			$this->article['body'] = $body;
			$this->article['author'] = $author;
			$this->article['timestamp'] = $timestamp;
		}
		
		public function returnArticle() {
			return $this->article;
		}
	
	}


?>
