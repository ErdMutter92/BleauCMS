<?php
	class CSV {

		private $fileLoc;
		private $delimiter;
		private $data;

		public function __construct($file, $delimiter) {
			$this->delimiter = $delimiter;
			$this->fileLoc = $file;

			$this->data = file_get_contents($this->fileLoc);
			$this->data = explode("\n", $this->data);
			array_pop($this->data);
			foreach ($this->data as $key => $item) {
				$this->data[$key] = explode($this->delimiter, $item);
			}
		}

		public function read($file, $delimiter) {
			$this->delimiter = $delimiter;
			$this->fileLoc = $file;

			$this->data = file_get_contents($this->fileLoc);
			$this->data = explode("\n", $this->data);
			array_pop($this->data);
			foreach ($this->data as $key => $item) {
				$this->data[$key] = explode($this->delimiter, $item);
			}
		}
		
		public function write() {
			$file = fopen($this->fileLoc, "w+");
			$tmpString = '';
			foreach ($this->data as $key => $item) {
				$arrayCount = count($item);
				foreach ($item as $sub_key => $sub_item) {
					$tmpString = $tmpString . $sub_item;
					if ($sub_key != ($arrayCount - 1)) {
						$tmpString = $tmpString . $this->delimiter;
					} else {
						$tmpString = $tmpString . "\n";
					}
				}
			}
			fwrite($file, $tmpString);
			unset($tmpString);
			fclose($file);
		}
		
		public function removeLine($lineNum) {
			unset($this->data[$lineNum]);
		}

		public function addLine($string) {
			$this->data[] = explode($this->delimiter, $string);
		}

		public function editLine($lineNum, $string) {
			$this->data[$lineNum] = explode($this->delimiter, $string);
		}

		public function returnArray() {
			return $this->data;
		}

	}
?>
