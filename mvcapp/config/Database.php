<?php  
	// koneksi DB
	class Database {
		protected $host = HOST_SERVER;
		protected $user = HOST_USER;
		protected $pass = HOST_PASS;
		protected $db	= HOST_DB;
		
		protected $conection;
		protected $statment;

		function __construct() {
			$db_connect = 'mysql:host='. $this->host .';dbname='. $this->db;

			$optimasi = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			];

			try {
				$this->conection = new PDO($db_connect, $this->user, $this->pass, $optimasi);
			} 
			catch(PDOException $e) {
				die($e->getMessage()); 
			}
		}

		// method query sql
		function query($sql) {
			$this->statment = $this->conection->prepare($sql);
		}

		// binding query
		function binding($param, $value, $type = NULL) {
			if (is_null($type)) {
				switch (true) {
					case is_int($value) : 
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value) :
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value) :
						$type = PDO::PARAM_NULL;
						break;
					default :
						$type = PDO::PARAM_STR;
				}
			}

			$this->statment->bindValue($param, $value, $type);
		}

		// method eksekusi query
		function execution() {
			$this->statment->execute();
		}

		// menampilkan seluruh data
		function resultAll() {
			$this->execution();
			return $this->statment->fetchAll(PDO::FETCH_ASSOC);
		}

		// menampilkan salah satu data
		function resultOne() {
			$this->execution();
			return $this->statment->fetch(PDO::FETCH_ASSOC);
		}

		function rowCount() {
			return $this->statment->rowCount();
		}
	}

?>