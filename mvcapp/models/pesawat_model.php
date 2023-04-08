<?php 
	class Pesawat_model {
		private $table = 'data_pesawat';
		private $db_conn;

		function __construct() {
			$this->db_conn = new Database;
		}

		// menampilkan data pesawat
		function getDataPesawat() {
			$query = "SELECT * FROM $this->table";

			$this->db_conn->query($query);
			return $this->db_conn->resultAll();
		}

		// proses tambah data
		function tambahDataPesawat($method) {
			$pesawat = htmlspecialchars($method['pesawat']);
			$jenis = htmlspecialchars($method['jenis']);
			$unit = htmlspecialchars($method['unit']);

			$sql = "SELECT * FROM $this->table WHERE Nama_Pesawat = '$pesawat'";
			$this->db_conn->query($sql);
			$namaPes = $this->db_conn->resultOne();

			// cek nama pesawat sudah diinput / belum
			if ($pesawat === $namaPes['Nama_Pesawat']) {
				Flasher::setFlash('Nama pesawat', 'sudah ada!', 'warning');
				header('Location: '. URL_UTAMA .'/pesawat/tambah_data');
				return false;
			} 
			else if ($pesawat !== $namaPes['Nama_Pesawat']) {
				$query = "INSERT INTO $this->table VALUES ('', :pesawat, :jenis, :unit)";

				$this->db_conn->query($query);
				$this->db_conn->binding('pesawat', $pesawat);
				$this->db_conn->binding('jenis', $jenis);
				$this->db_conn->binding('unit', $unit);
				
				$this->db_conn->execution();
				Flasher::setFlash('Data berhasil', 'disimpan!', 'success');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit;
			} 
			else {
				Flasher::setFlash('Data gagal', 'disimpan!', 'danger');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit;
			}
		}

		// proses delete data
		function deleteDataPesawat($id) {
			$query = "DELETE FROM $this->table WHERE KD_Pesawat = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses edit data
		function getDataEdit($id) {
			$query = "SELECT * FROM $this->table WHERE KD_Pesawat = $id";

			$this->db_conn->query($query);
			return $this->db_conn->resultOne();
		}
		function editDataPesawat($method) {
			$id = htmlspecialchars($method['id']);
			$pesawat = htmlspecialchars($method['pesawat']);
			$jenis =htmlspecialchars( $method['jenis']);
			$unit = htmlspecialchars($method['unit']);

			$query = "UPDATE $this->table SET Nama_Pesawat = :pesawat, Jenis_Pesawat = :jenis, Jumlah_Unit = :unit 
			WHERE KD_Pesawat = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);
			$this->db_conn->binding('pesawat', $pesawat);
			$this->db_conn->binding('jenis', $jenis);
			$this->db_conn->binding('unit', $unit);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}
	}

?>