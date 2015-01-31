<?php

require_once "library/csv.php";

class template {

	private $languageFile;
	private $resources;
	private $resourceFiles;
	private $resourceTemplates;
	private $index;

	private function replace() {

		## scans through the data elements directory for resources to keep
		## an eye out for in the index.
		foreach (scandir('./data/elements') as $elementFile) {
			if (($elementFile != '.') AND ($elementFile != '..') 
				AND ($elementFile != '.DS_Store')) {
				## splits the elementFile variable into an array where the key of 0 
				## equals the files name without the extension. Then replaces any
				## underscore with white space before adding it to an array of resource
				## titles for later use.
				$this->resources[] = str_replace("_", " ", split(".csv", $elementFile)[0]);
				$this->resourceFiles[] = $elementFile;
			}
		}
		

		$ctr1 = 0;
		foreach ($this->resources as $term) {
			## Splits the index based on the resource indicator then takes the middle
			## entry of the 3 part array. This should be the element's template.
			$this->resourceTemplates[] = split("{%".$term."%}", $this->index)[1];
			
			$indexStart = split("{%".$term."%}", $this->index)[0];
			$indexMid = '';
			$indexEnd = split("{%".$term."%}", $this->index)[2];

			$tempElements = new csv("./data/elements/".$this->resourceFiles[$ctr1]."", '|');
			foreach ($tempElements->getFields() as $entry) {
				$ctr = 0;
				$tempElement = split("{%".$term."%}", $this->index)[1];
				foreach ($entry as $field) {
					$tempElement = str_replace("{%".$ctr."%}", "".$field."", $tempElement);
					$ctr++;
				}
				$indexMid = $indexMid . $tempElement;
			}
			$ctr1++;
			$this->index = $indexStart . $indexMid . $indexEnd;
		}

		## Replaces template language tags in index with their corresponding
		## defenition in the language file.
		$language = new csv($this->languageFile, '|');
		foreach ($language->getFields() as $term) {
			$this->index = str_replace("{?".$term[0]."?}", "".$term[1]."", $this->index);
		}
	
	}

	public function __construct($index, $csv) {
		$this->languageFile = $csv;
		$this->index = file_get_contents($index);
		$this->replace();
		print($this->index);
	}

}

?>
