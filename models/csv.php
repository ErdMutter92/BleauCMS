<?php
/********************************************************

   Title: CSV (aka: Comma Seperated Values)
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: Manages files written in a CSV style
   format for use as a data source.


********************************************************/

	class CSV {

		private $fileLoc;
		private $delimiter;
		private $data;

		public function __construct($file, $delimiter) {
			$this->read($file, $delimiter);
		}

		// (string) $file = csv file location
		// (string) $delimiter = char(s) used to seperate line items.
		// outputs: array ($data) with an array of the lines of the
		//	    $file broken up into sub arrays by $delimiter. 
		public function read($file, $delimiter) {
			$this->delimiter = (string) $delimiter;
			$this->fileLoc = (string) $file;
			
			$this->data = file_get_contents($this->fileLoc);

			$this->data = explode("\n", $this->data);

			// some reason, there is always a blank entry at the end,
			// we remove it as it will just cause problems later.
			array_pop($this->data);

			// each entry (line) in the array then needs to be broken up
			// into sub arrays where the delimiter is the seperater.
			foreach ($this->data as $key => $item) {
				$this->data[$key] = explode($this->delimiter, $item);
			}
		}
		
		// runs through the $data array's and changes them into a string
		// with the format nececary to write back to a file. Writes back
		// to the original file which the data started.
		public function write() {
			$file = fopen($this->fileLoc, "w+");

			// temperary string to hold the elements from $data in.
			$tmpString = '';  

			// a nested foreach that goes through the sub arrays and
			// concatnates them into the string.
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
		
		// used to remove a line from the array by it's key.
		public function removeLine($lineNum) {
			unset($this->data[$lineNum]);
		}

		// adds a line to the end of the array, and
		// creates the sub-array based on the delimiter.
		public function addLine($string) {
			$this->data[] = explode($this->delimiter, $string);
		}

		// replaces a pre-existing entry in the array with a string
		// that is changed into a sub array.
		public function editLine($lineNum, $string) {
			$this->data[$lineNum] = explode($this->delimiter, $string);
		}

		public function returnArray() {
			return $this->data;
		}

	}
?>
