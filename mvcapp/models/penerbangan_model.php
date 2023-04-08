<?php 
	class Penerbangan_model {
		private $table = 'data_penerbangan';
		private $db_conn;

		function __construct() {
			$this->db_conn = new Database;
		}

		// menampilkan data penerbangan
		function getDataPenerbangan() {
			$query = "SELECT * FROM $this->table";

			$this->db_conn->query($query);
			return $this->db_conn->resultAll();
		}

		// proses tambah data
		function tambahDataPenerbangan($method) {
			$jenis = htmlspecialchars($method['jenis']);
			$harga = htmlspecialchars($method['harga']);

			$sql = "SELECT * FROM $this->table WHERE Jenis_Penerbangan = '$jenis'";
			$this->db_conn->query($sql);
			$jenisPen = $this->db_conn->resultOne();

			// cek jenis penerbangan sudah diinput / belum
			if ($jenis === $jenisPen['Jenis_Penerbangan']) {
				Flasher::setFlash('Jenis penerbangan', 'sudah ada!', 'warning');
				header('Location: '. URL_UTAMA .'/penerbangan/tambah_data');
				return false;
			} 
			else if ($jenis !== $jenisPen['Jenis_Penerbangan']) {
				$query = "INSERT INTO $this->table VALUES ('', :jenis, :harga)";

				$this->db_conn->query($query);
				$this->db_conn->binding('jenis', $jenis);
				$this->db_conn->binding('harga', $harga);

				$this->db_conn->execution();
				Flasher::setFlash('Data berhasil', 'disimpan!', 'success');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit;
			} 
			else {
				Flasher::setFlash('Data gagal', 'disimpan!', 'danger');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit;
			}			
		}

		// proses delete data
		function deleteDataPenerbangan($id) {
			$query = "DELETE FROM $this->table WHERE KD_Penerbangan = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses edit data
		function getDataEdit($id) {
			$query = "SELECT * FROM $this->table WHERE KD_Penerbangan = $id";

			$this->db_conn->query($query);
			return $this->db_conn->resultOne();
		}
		function editDataPenerbangan($method) {
			$id = htmlspecialchars($method['id']);
			$jenis = htmlspecialchars($method['jenis']);
			$harga = htmlspecialchars($method['harga']);

			$query = "UPDATE $this->table SET Jenis_Penerbangan = :jenis, Harga_Penerbangan = :harga 
			WHERE KD_Penerbangan = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);
			$this->db_conn->binding('jenis', $jenis);
			$this->db_conn->binding('harga', $harga);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}
	}

?>