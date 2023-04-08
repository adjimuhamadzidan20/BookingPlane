<?php  
	class Logout extends Controller {
		function proses_logout() {
			$this->models('logout_model')->logout();
		}
	}

?>