<?php
/********************************************************

   Title: controller
   Author: Brandon "Alexis" Bleau (bmbleau@gmail.com)
   Discription: takes the user input and sends that to
   the aproprate location.


********************************************************/

	require('./views/view.php');
	require('./models/model.php');

	class Controller {

		// default page to load when no other
		// page is defined.
		private $landingPage = 'index';

		private $controllerMap = array (
			"blog" => "index",
			"index" => "index",
			"about" => "about_me"
		);

		// Upon inital construction of the object, this takes
		// the array along with the key to contain the page
		// requests and makes sure it's set before returnning
		// a corresponding function, if not set returns
		// the function corresponding to the landingPage.
		public function __construct($key) {

			$this->view = new View('./views/templates/Starry Night/');
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
				return $this->$controller($name);
			} else {
				return $this->error404($name);
			}
		}

		// Handles any page not found issues that arrise. 
		private function error404($name) {
			header("HTTP/1.0 404 Not Found");
			$post = new PostDAO('./data/errors.csv', '|');
			$tags = new TagDAO('./data/tags.csv', '|');

			$post = $post->getArticles(0, 1);
			$data = array_merge($tags->getAll(), $post);

			$this->view->distributeData($data);
			$this->view->display();
		}

		private function index($name) {
			$post = new PostDAO('./data/posts.csv', '|');
			$tags = new TagDAO('./data/tags.csv', '|');

			$post = $post->getArticles(0, 5);

			$data = array_merge($tags->getAll(), $post);

			$this->view->distributeData($data);
			$this->view->display();
		}

		private function about_me($name) {
			$post = new PostDAO('./data/about_me.csv', '|');
			$tags = new TagDAO('./data/tags.csv', '|');

			$post = $post->getArticles(0, 5);

			$data = array_merge($tags->getAll(), $post);

			$this->view->distributeData($data);
			$this->view->display();
		}

	}

?>
