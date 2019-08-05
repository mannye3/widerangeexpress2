<?php
	/*App Core class
	Creates URL and loads core controller
	URL FORMAT - /controller/method/params*/
// http://localhost/waste/pages/about
	class Core {
		protected $currentController = 'Admins';
		protected $currentMethod = 'index';
		protected $params = [];

		public function __construct(){
			//print_r($this->getUrl());
			$url = $this->getUrl();

			// Look in controllers for first value
			if(file_exists('../../appadm/controllers/' . ucwords($url[0]) . '.php')){

				// If exists, set as controller
				$this->currentController = ucwords($url[0]);

				// Unset 0 Index
				unset($url[0]);
			}

			// Require the controller
			require_once('../../appadm/controllers/' . $this->currentController . '.php');

			// Instantiate controller class
			$this->currentController = new $this->currentController;
			// $object = new Pages();
			
			// Check for second part of url
			if(isset($url[1])){
				// Check to see if method exists in controller
				if(method_exists($this->currentController, str_replace("-","_",$url[1]))){

					// If exists, set as method
					$this->currentMethod = str_replace("-","_",$url[1]);

					// Unset 1 Index
					unset($url[1]);
				}
			}

			// Get parameters part which is after the first two arrays at index 0 (Controller) and index 1 (Method) are removed
			$this->params = $url ? array_values(array_splice($url, 0, 2)) : [];

			// Call a callback with array of params
			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
			
		}

		public function getUrl(){
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}
?>