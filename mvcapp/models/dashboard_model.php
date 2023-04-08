<?php  
	class Dashboard_model {
		private $db_conn;
		private $tabelPes = 'data_pesawat';
		private $tabelPen = 'data_penerbangan';
		private $tabelPem = 'data_pemesan';
		private $tabelJad = 'jadwal_keberangkatan';

		function __construct() {
			$this->db_conn = new Database;
		}

		function jumlahDataPesawat() {
			$query = "SELECT * FROM $this->tabelPes";
			
			$this->db_conn->query($query);
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		function jumlahDataPenerbangan() {
			$query = "SELECT * FROM $this->tabelPen";

			$this->db_conn->query($query);
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		function jumlahDataPemesan() {
			$query = "SELECT * FROM $this->tabelPem";

			$this->db_conn->query($query);
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		function jumlahDataJadwal() {
			$query = "SELECT * FROM $this->tabelJad";

			$this->db_conn->query($query);
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}
	}

?>