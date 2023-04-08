<?php
	session_start();

	if (isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/dashboard');
		exit;
	} 

	class Register extends Controller {
		function index() {
			$data['title'] = 'Register';

			$this->views('templates/header', $data);
			$this->views('register/register');
			$this->views('templates/footer');
		}

		function proses_register() {
			$this->models('register_model')->register($_POST);
		}
	}

?>