<?php  
	class Jadwal_model {
		private $table1 = 'jadwal_keberangkatan';
		private $table2 = 'data_pemesan';
		private $table3 = 'data_pesawat';
		private $db_conn;

		function __construct() {
			$this->db_conn = new Database;
		}

		// menampilkan data jadwal
		function getDataJadwal() {
			$query = "SELECT * FROM $this->table1, $this->table2, $this->table3 WHERE 
			$this->table1.ID_pemesan = $this->table2.ID_pemesan AND 
			$this->table1.KD_Pesawat = $this->table3.KD_Pesawat";

			$this->db_conn->query($query);
			return $this->db_conn->resultAll();
		}

		// proses tambah data
		function tambahJadwal($method) {
			$nama = $method['nama'];
			$pesawat = $method['pesawat'];
			$rute = $method['rute'];
			$tanggal = $method['tanggal'];
			$jam = $method['jam'];

			$query = "INSERT INTO $this->table1 VALUES ('', :nama, :pesawat, :rute, :tanggal, :jam)";

			$this->db_conn->query($query);
			$this->db_conn->binding('nama', $nama);
			$this->db_conn->binding('pesawat', $pesawat);
			$this->db_conn->binding('rute', $rute);
			$this->db_conn->binding('tanggal', $tanggal);
			$this->db_conn->binding('jam', $jam);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses edit data
		function getDataEdit($id) {
			$query = "SELECT * FROM $this->table1, $this->table2, $this->table3 
			WHERE $this->table1.ID_pemesan = $this->table2.ID_pemesan AND 
			$this->table1.KD_Pesawat = $this->table3.KD_Pesawat AND ID_KBR = $id";

			$this->db_conn->query($query);
			return $this->db_conn->resultOne();
		}
		function editJadwal($method) {
			$id = $method['id'];
			$nama = $method['nama'];
			$pesawat = $method['pesawat'];
			$rute = $method['rute'];
			$tanggal = $method['tanggal'];
			$jam = $method['jam'];

			$query = "UPDATE $this->table1 SET ID_pemesan = :nama, KD_Pesawat = :pesawat, Rute_penerbangan = :rute,
			Tgl_keberangkatan = :tanggal, Jam_keberangkatan = :jam WHERE ID_KBR = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);
			$this->db_conn->binding('nama', $nama);
			$this->db_conn->binding('pesawat', $pesawat);
			$this->db_conn->binding('rute', $rute);
			$this->db_conn->binding('tanggal', $tanggal);
			$this->db_conn->binding('jam', $jam);

			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}

		// proses delete data
		function deleteJadwal($id) {
			$query = "DELETE FROM $this->table1 WHERE ID_KBR = :id";

			$this->db_conn->query($query);
			$this->db_conn->binding('id', $id);
			
			$this->db_conn->execution();
			return $this->db_conn->rowCount();
		}
	}

?>