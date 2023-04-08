<?php  
	class Register_model {
		private $db_conn;

		function __construct() {
			$this->db_conn = new Database;
		}

		function register($method) {
			$username = htmlspecialchars(stripcslashes($method['username']));

			$query = "SELECT * FROM users WHERE Username = '$username'";
			$this->db_conn->query($query);
			$user = $this->db_conn->resultOne();

			// cek username sudah ada / belum digunakan
			if ($username === $user['Username']) {
				Flasher::setFlash('Username', 'sudah ada!', 'warning');
				header('Location: '. URL_UTAMA .'/register');
				return false;
			}

			$password = htmlspecialchars($method['password']);
			$confirm = htmlspecialchars($method['confirm_password']);

			// confirm password sesuai apa tidak
			if ($password !== $confirm) {
				Flasher::setFlash('Password', 'tidak sesuai!', 'warning');
				header('Location: '. URL_UTAMA .'/register');
				return false;
			} 
			else {
				// enkripsi password
				$enkrip_pass = password_hash($password, PASSWORD_DEFAULT);
				
				$query = "INSERT INTO users VALUES ('', :username, :password)";
				$this->db_conn->query($query);
				$this->db_conn->binding('username', $username);
				$this->db_conn->binding('password', $enkrip_pass);
				$this->db_conn->execution();

				Flasher::setFlash('Daftar akun', 'berhasil!', 'success');
				header('Location: '. URL_UTAMA .'/register');
				exit;
			}
		}
	}

?>