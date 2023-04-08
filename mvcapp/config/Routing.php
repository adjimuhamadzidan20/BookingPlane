<?php  
	// routing url
	class Routing {
		protected $controller = 'Dashboard';
		protected $method = 'index';
		protected $parameter = [];

		function __construct() {
			$URL = $this->getURL();

			if ($URL == NULL) {
				$URL = [$this->controller];
			}

			if (file_exists('../mvcapp/controllers/'. $URL[0] .'.php')) {
				$this->controller = $URL[0];
				// var_dump($URL);
				unset($URL[0]);
			}

			require_once '../mvcapp/controllers/'. $this->controller .'.php';
			$this->controller = new $this->controller;

			if (isset($URL[1])) {
				if (method_exists($this->controller, $URL[1])) {
					$this->method = $URL[1];
					// var_dump($URL);
					unset($URL[1]);
				}
			}
			
			if (!empty($URL)) {
				$this->parameter = array_values($URL);
				// var_dump($URL);
			}

			call_user_func_array([$this->controller, $this->method], $this->parameter);
		}		

		// menangkap isi url
		function getURL() {
			if (isset($_GET['URL'])) {
				$URL = rtrim($_GET['URL'], '/');
				$URL = filter_var($URL, FILTER_SANITIZE_URL);
				$URL = explode('/', $URL);
				return $URL;
			}
		}
	}

?>