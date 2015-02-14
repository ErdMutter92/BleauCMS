<?php

	require('./models/nav.php');

	class NavDAO {

		private $csvFileLoc;
		private $delimiter;
		private $handler;
		private $nav;

		public function __construct($csvFileLoc, $delimiter) {
			$this->csvFileLoc = $csvFileLoc;
			$this->delimiter = $delimiter;
			$this->handler = new CSV($csvFileLoc, $delimiter);
		}

		public function create($id, $text, $url, $target) { 
			$tmpString = $id . $this->delimiter . $text . $this->delimiter . $url . $this->delimiter . $target;

			$this->handler->addLine($tmpString);

			$this->handler->write();
		}

		public function update(Nav $object) { 
			$tmpString = $object->getID() . $this->delimiter . $object->getText() . $this->delimiter .
				     $object->getURL() . $this->delimiter . $object->getTarget();

			$this->handler->editLine($object->getID(), $tmpString);
			$this->handler->write();
		}

		public function get($id) { 
			$nav = $this->handler->returnArray()[$id];
			$object = new Nav($nav[0], $nav[1], $nav[2], $nav[3]);

			return $object;
		}

		public function delete(Nav $object) { 
			$this->handler->removeLine($object->getID());
			$this->handler->write();
		}

		public function getAll() { 
			$nav = $this->handler->returnArray();

			foreach ($nav as $item) {
				$object = new Nav($item['0'], $item['1'], $item['2'], $item['3']);
				$this->nav[] = $object;
			}

			return $this->nav;
		}

	}

?>
