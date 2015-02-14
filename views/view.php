<?php

	require('./views/template.php');

	class View {

		private $dataObject = array();
		private $allowedObjs = array("Article", "Tag", "Nav", "Menu");
		private $template;
		private $html;

		public function __construct($templateDir) {
			$this->template = new Template($templateDir);
			$this->html = $this->template->getHTMLContents();
		}

		// INPUT: (array) an array of data entities.
		// takes an array of data entities passed from the model and
		// sends them to the aproprate functions which allow the
		// data to be used in the view.
		public function distributeData(array $arrayOfObjects) {
			foreach ($arrayOfObjects as $object) {

				// creates a string containing the function name
				// assocated with the handling of that data object.
				$functionName = 'handle' . get_class($object);

				// Makes sure the object is within the allowed objects.
				if (false !== array_search(get_class($object), $this->allowedObjs)) {
					$this->$functionName($object);
				}
			}
		}

		public function display() {
			echo $this->html;
		}

		private function handleTag(Tag $object) {
			$tagStr = '<!-- ' . $object->getSymble() . ' ' . $object->getTag() . ' -->';
			$this->html = str_replace($tagStr, $object->getContents(), $this->html);
		}

		
		private function handleArticle(Article $object) {
			$postTemplate = $this->template->getPost();

			$postTemplate = str_replace('<!-- ARTICLE_TITLE -->', $object->getTitle(), $postTemplate);
			$postTemplate = str_replace('<!-- ARTICLE_AUTHOR -->', $object->getAuthor(), $postTemplate);
			$postTemplate = str_replace('<!-- ARTICLE_TEXT -->', $object->getBody(), $postTemplate);
			$postTemplate = str_replace('<!-- ARTICLE_TIME -->', $object->getTimestamp(), $postTemplate);
			$postTemplate = str_replace('<!-- COMMENTS_LINK -->', 'Comments (0)', $postTemplate);
			$postTemplate .= '<!-- POST_HERE -->';

			$this->html = str_replace('<!-- POST_HERE -->', $postTemplate, $this->html);

		}

		private function handleNav(Nav $object) {
			$navTemplate = $this->template->getNav();
			
			$navTemplate = str_replace('<!-- NAV_TEXT -->', $object->getText(), $navTemplate);
			$navTemplate = str_replace('<!-- NAV_URL -->', $object->getURL(), $navTemplate);
			$navTemplate = str_replace('<!-- NAV_TARGET -->', $object->getTarget(), $navTemplate);
			$navTemplate .= '<!-- NAV_HERE -->';

			$this->html = str_replace('<!-- NAV_HERE -->', $navTemplate, $this->html);
		}

		private function handleMenu(Menu $object) {
			$menuTemplae = $this->template->getMenu();

			$menuTemplate = str_replace('<!-- MENU_TITLE -->', $object->getTitle(), $menuTemplate);
			$menuTemplate = str_replace('<!-- MENU_HTML -->', $object->getBody(), $menuTemplate);
			$menuTemplate .= '<!-- MENU_HERE -->';

			$this->html = str_replace('<!-- MENU_HERE -->', $menuTemplate, $this->html);
		}

	}

?>
