<?php
/********************************************************

   Title: Tags
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: Built ontop of the CSV class, this
   Tags class will take a Blog object along with a
   specally formated csv file and apply the terms
   from that file replaceing the tags in the html.

   CSV file format: <TAG>|<SYMBLE>|<TERM>
   HTML Tag Format: {<SYMBLE><TAG><SYMBLE>}


********************************************************/
	class Tags extends CSV {

		private $tags;
		private $html;

		// takes a Blog object along with a CSV file
		// and replaces the tags within the Blog's html
		// variable with the contents of the Tag within
		// the CSV file.
		public function __construct(Blog $blog, $file) {
			// get the html from Blog object and save it.
			$this->html = $blog->getHTML();

			// processes the $file using the | as delimiter.
			$this->read($file, '|');

			// returns the array genereated by CSV.
			$this->tags = $this->returnArray();

			// goes through and replaces every instance of 
			// the tag within the html variable with the meaning
			// assigned in the $file.
			foreach ($this->tags as $key => $item) {
				$term = "{". $item[1] . $item[0] . $item[1] . "}";
				$meaning = $item[2];
				$this->html = str_replace($term, $meaning, $this->html);
			}
		}

		// returns the tags array.
		public function getTags() {
			return $this->tags;
		}

		// used by Blog to get the contents of the website
		// back after processing the tags.
		public function getHTML() {
			return $this->html;
		}

		// Currently Unused
		// Adds a tag to the tags array without it having to be in the
		// CSV file.
		private function registerTag($tag, $resource, $override = False) {
			if ((!isset($this->tags[$tag])) || ($override == True)) {
				$this->tags[$tag] = $resource;
			}
		}
	
		// Currently Unused
		// Removes a tag from the tags array so not to be processed.
		private function deregisterTag($tag) {
			unset($this->tags[$tag]);
		}
	
	}
?>
