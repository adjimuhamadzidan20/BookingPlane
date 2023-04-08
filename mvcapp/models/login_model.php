<?php
	class Login_model {
		private $db_conn;
		private $table = 'users';

		function __construct() {
			$this->db_conn = new Database;
		}

		// proses login
		function login($method) {
			$user = htmlspecialchars($method['username']);
			$pass = htmlspecialchars($method['password']);

			// username & password default
			if ($user === 'admin123' AND $pass === 'admin123') {
				$_SESSION['dashboard'] = true;
				$_SESSION['user'] = strtoupper($user);
				header('Location: '. URL_UTAMA .'/dashboard');
				exit;
			} 
			else {
				$query = "SELECT * FROM $this->table WHERE Username = '$user'";
				$this->db_conn->query($query);
				$res = $this->db_conn->resultOne();

				// cek username 
				if ($user === $res['Username']) {
					// cek password
					if (password_verify($pass, $res['Password'])) {
						$_SESSION['dashboard'] = true;
						$_SESSION['user'] = strtoupper($res['Username']);

						header('Location: '. URL_UTAMA .'/dashboard');
						exit;
					} else {
						Flasher::setFlash('Password', 'anda salah!', 'danger');
						header('Location: '. URL_UTAMA .'/dashboard');
						exit;
					}
				} 
				else {
					Flasher::setFlash('Username', 'tidak sesuai!', 'danger');
					header('Location: '. URL_UTAMA .'/dashboard');
					exit;
				}
			}
		}
	}

?>