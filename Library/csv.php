<?php

class csv {
	
	private $csvFileContents;
	private $fields;
	
	private function openFile($file) {
		$this->csvFileContents = file_get_contents($file);
	}

	public function reader($file, $delimiter = ',') {
		/*
			Reads a csv file into an array by spliting it by 
			the new line char, then breaks it up by the delimiter.
		*/

		$this->openFile($file);

		## seperate each new line into an array item.
		$this->csvFileContents = split("\n", $this->csvFileContents);

		## unknown why the split function produces an empty array item,
		## but array_pop removes that entry from the array.
		array_pop($this->csvFileContents);

		## for each entry in the array split into sub array using the delimiter
		## as reference.
		foreach ($this->csvFileContents as $value) {
			$this->fields[] = explode($delimiter, $value);
		}
		return $this->fields;
		
	}

	private function append() {
		
	}

	public function getFields() {
		return $this->fields;
	}

	public function writer($file, $delimiter) {
		/*
			Steps through the array, along the way it concatinates
			the values to a temp string. Once complted it puts the
			string into the file, saving it for later.
		*/
		$tempString = '';
		foreach ($this->fields as $value) {
			$fieldCount = count($value);
			$ctr = 0;
			foreach ($value as $field) {
				$tempString = $tempString . '' .$field;
				++$ctr;
				if ($ctr != $fieldCount) {
					$tempString = $tempString . '' ."".$delimiter."";
				}
			}
			$tempString = $tempString . '' ."\n";
		}
		file_put_contents($file, $tempString);
		return TRUE;
	}

	public function __construct($file = null, $delimiter = ',') {
		if (isset($file)) {
			$this->reader($file, $delimiter);
		}
	}

}

?>
