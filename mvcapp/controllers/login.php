<?php
	session_start();

	if (isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/dashboard');
		exit;
	}
	
	class Login extends Controller {
		// halaman login
		function index() {
			$data['title'] = 'Login';

			$this->views('templates/header', $data);
			$this->views('login/login');
			$this->views('templates/footer');
		}

		function proses_login() {
			$this->models('login_model')->login($_POST);
		}

	}

?>