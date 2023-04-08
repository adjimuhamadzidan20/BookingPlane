<?php
	session_start();

	class Logout_model {
		
		function logout() {
			$_SESSION = [];
		  session_unset();
		  session_destroy();

		  header('Location: '. URL_UTAMA .'/login');
		  exit;
		}
	}

?>