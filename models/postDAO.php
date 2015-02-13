<?php

	require('./models/article.php');

	class PostDAO {

		private $csvFileLoc;
		private $delimiter;
		private $handler;

		public function __construct($csvFileLoc = './data/posts.csv', $delimiter) {
			$this->csvFileLoc = $csvFileLoc;
			$this->delimiter = $delimiter;
			$this->handler = new CSV($this->csvFileLoc, $delimiter);
		}

		// INPUT: Article entity
		// creates a post in the posts database.
		public function create(Article $object) {
			// creates a string containing the format needed for addLine
			$tmpString = $object->getID() . $this->delimiter . $object->getTitle() . $this->delimiter . 
				     $object->getBody() . $this->delimiter . $object->getAuthor() . $this->delimiter . 
				     $object->getTimestamp();

			// adds the temp string to the database's array
			$this->handler->addLine($tmpString);
			// writes the database's array to file
			$this->handler->write();
		}

		public function update(Article $object) {
			// creates a string containing the format needed for addLine
			$tmpString = $object->getID() . $this->delimiter . $object->getTitle() . $this->delimiter . 
				     $object->getBody() . $this->delimiter . $object->getAuthor() . $this->delimiter . 
				     $object->getTimestamp();

			// edits the database array at the given id.
			$this->handler->editLine($object->getID(), $tmpString);

			$this->handler->write();
		}

		public function get($id) {
			$article = $this->handler->returnArray()[$id];
			$object = new Article($article['0'], $article['1'], $article['2'], $article['3'], $article['4']);
			return $object;
		}	

		public function delete($id) {
			$this->handler->removeLine($id);
		}
	}
?>
