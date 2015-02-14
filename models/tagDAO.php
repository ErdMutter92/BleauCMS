<?php

	require('./models/tag.php');

	class TagDAO {

		private $csvFileLoc;
		private $delimiter;
		private $handler;
		private $tags;

		public function __construct($csvFileLoc = './data/posts.csv', $delimiter) {
			$this->csvFileLoc = $csvFileLoc;
			$this->delimiter = $delimiter;
			$this->handler = new CSV($this->csvFileLoc, $delimiter);
		}

		public function create(Tag $object) { 
			$tmpString = $object->getID() . $this->delimiter . $object->getTag() . $this->delimiter .
				      $object->getSymble() . $this->delimiter . $object->getContents();

			$this->handler->addLine($tmpString);
			$this->handler->write();
		}

		public function update(Tag $object) { 
			$tmpString = $object->getID() . $this->delimiter . $object->getTag() . $this->delimiter .
				      $object->getSymble() . $this->delimiter . $object->getContents();

			$this->handler->editLine($object->getID, $tmpString);
			$this->handler->write();
		}

		public function get($id) { 
			$tag = $this->handler->returnArray()[$id];

			$object = new Tag($tag['0'], $tag['1'], $tag['2'], $tag['3']);

			return $object;
		}
	
		public function getAll() {
			$tags = $this->handler->returnArray();

			foreach ($tags as $key => $item) {
				$object = new Tag($key, $item['1'], $item['2'], $item['3']);
				$this->tags[] = $object;
			}

			return $this->tags;
		}

		public function delete($lineNum) { 
			$this->handler->removeLine($lineNum);
			$this->handler->write();
		}

	}

?>
