<?php
	class XML {

		private $xmlFile;
		private $data;

		public function __construct($file) {
			$this->xmlFile = $file;
			$file = simplexml_load_file($file);
			foreach ($file as $key => $item) {
				$this->data[$key] = "".$item;
			}
		}
		
		public function write($tag) {
			$file = fopen($this->xmlFile, "w");
			$tmpString = "<?xml version='1.0' encoding='UTF-8'?>\n<".$tag.">\n";
			foreach ($this->data as $key => $item) {
				$tmpString = $tmpString . "	<" . $key . ">" . $item . "</" . $key . ">\n";
			}
			$tmpString = $tmpString . "</".$tag.">";
			fwrite($file, $tmpString);
			unset($tmpString);
			fclose($file);	
		}
		
		public function add($key, $item) {
			$this->data[$key] = $item;
		}

		public function remove($key) {
			unset($this->data[$key]);
		}

		public function getData() {
			return $this->data;
		}

	}
?>
