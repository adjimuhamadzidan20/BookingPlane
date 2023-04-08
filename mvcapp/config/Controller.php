<?php  
	class Controller {
		function views($path, $data = []) {
			require_once '../mvcapp/views/'. $path .'.php';
		}

		function models($path) {
			require_once '../mvcapp/models/'. $path .'.php';
			return new $path;
		}
	}

?>