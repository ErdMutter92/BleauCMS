<?php
/********************************************************

   Title: controller
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: takes the user input and sends that to
   the aproprate location.


********************************************************/

	require('./views/template.php');
	require('./models/model.php');

	class Controller {

		// default page to load when no other
		// page is defined.
		private $landingPage = 'index';

		public $controllerMap = array (
			"blog" => "index",
			"index" => "index",
		);

		// Upon inital construction of the object, this takes
		// the array along with the key to contain the page
		// requests and makes sure it's set before returnning
		// a corresponding function, if not set returns
		// the function corresponding to the landingPage.
		public function __construct($key) {

			$this->view = new Template();
			$this->model = new Model();

			if (isset($_GET[$key])) {
				$this->returnFunction($_GET[$key]);
			} else {
				
				$this->returnFunction($this->landingPage);
			}
			
			unset($_GET[$key]);
		}

		// If the required page is in the controller map
		// returns the coresponding controller else
		// returns the error404 controller.
		public function returnFunction($name) {
			// Makes sure the requested page ($name) has a controller
			if (array_key_exists($name, $this->controllerMap)) {
				$controller = $this->controllerMap[$name];
				return $this->$controller();
			} else {
				return $this->error404();
			}
		}

		// Handles any page not found issues that arrise. 
		public function error404() {
			header("HTTP/1.0 404 Not Found");
			$this->view->consolidate('error404', array ());
			$this->view->display();
		}

		public function index() {
			$this->view->consolidate('index', array ());
			$this->view->display();
		}

	}

?>
