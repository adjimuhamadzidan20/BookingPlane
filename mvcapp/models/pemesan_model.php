<?php 
	class Pemesan_model {
		private $table = 'data_pemesan';
		private $table2 = 'data_penerbangan';
		private $db_conn;

		function __construct() {
			$this->db_conn = new Database;
		}

		// menampilkan data pemesan
		function getDataPemesan() {
			$query = "SELECT * FROM $this->table, $this->table2 WHERE $this->table.KD_Penerbangan = $this->table2.KD_Penerbangan";

			$this->db_conn->query($query);
			return $this->db_conn->resultAll();
		}

		// proses tambah data
		function tambahDataPemesan($method) {
			$nama = htmlspecialchars($method['nama']);
			$alamat = htmlspecialchars($method['alamat']);
			$jenis = htmlspecialchars($method['jenis']);
			$tiket = htmlspecialchars($method['tiket']);

			$query = "INSERT INTO $this->table VALUES ('', :nama, :alamat, :jenis, :tiket)";

			$this->db_conn->query($query);
			$this->db_conn->binding('nama', $nama);
			$this->db_conn->binding('alamat', $alamat);
			$this->db_conn->binding('jenis', $jenis);
			$this->db_conn->binding('tiket', $tiket);
			
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses delete data
		function deleteDataPemesan($id) {
			$query = "DELETE FROM $this->table WHERE ID_pemesan = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses edit data
		function getDataEdit($id) {
			$query = "SELECT * FROM $this->table, $this->table2 WHERE $this->table.KD_Penerbangan = $this->table2.KD_Penerbangan
			AND ID_pemesan = $id";

			$this->db_conn->query($query);
			return $this->db_conn->resultOne();
		}
		function editDataPemesan($method) {
			$id = htmlspecialchars($method['id']);
			$nama = htmlspecialchars($method['nama']);
			$alamat = htmlspecialchars($method['alamat']);
			$jenis = htmlspecialchars($method['jenis']);
			$tiket = htmlspecialchars($method['tiket']);

			$query = "UPDATE $this->table SET Nama_pemesan = :nama, Alamat_pemesan = :alamat, KD_Penerbangan = :jenis, 
			Jumlah_tiket = :tiket WHERE ID_pemesan = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);
			$this->db_conn->binding('nama', $nama);
			$this->db_conn->binding('alamat', $alamat);
			$this->db_conn->binding('jenis', $jenis);
			$this->db_conn->binding('tiket', $tiket);
			
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}
	}

?>