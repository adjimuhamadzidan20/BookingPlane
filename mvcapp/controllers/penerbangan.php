<?php  
	session_start();

	if (!isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/login');
		exit;
	}

	class Penerbangan extends Controller {
		// halaman data penerbangan
		function index() {
			$data['title'] = 'Penerbangan';
			$data['penerbangan'] = $this->models('penerbangan_model')->getDataPenerbangan();

			$this->views('templates/header', $data);
			$this->views('datapenerbangan/halaman_penerbangan', $data);
			$this->views('templates/footer');
		}

		// halaman tambah data penerbangan
		function tambah_data() {
			$data['title'] = 'Tambah Data';

			$this->views('templates/header', $data);
			$this->views('datapenerbangan/tambah_dt_penerbangan');
			$this->views('templates/footer');
		}
		function proses_tambah() {
			$this->models('penerbangan_model')->tambahDataPenerbangan($_POST);
		}

		// proses delete data
		function delete_data($id) {
			if ($this->models('penerbangan_model')->deleteDataPenerbangan($id) > 0) {
				Flasher::setFlash('Data berhasil', 'dihapus!', 'success');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'dihapus!', 'danger');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit;
			}
		}

		// halaman edit data penerbangan
		function edit_data($id) {
			$data['title'] = 'Edit Data';
			$data['penerbangan'] = $this->models('penerbangan_model')->getDataEdit($id);

			$this->views('templates/header', $data);
			$this->views('datapenerbangan/edit_dt_penerbangan', $data);
			$this->views('templates/footer');
		}
		function proses_edit() {
			if ($this->models('penerbangan_model')->editDataPenerbangan($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'diubah!', 'success');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit; 
			} else {
				Flasher::setFlash('Data gagal', 'diubah!', 'danger');
				header('Location: '. URL_UTAMA .'/penerbangan');
				exit; 
			}
		}

		// cetak data
		function Cetak_Data_Penerbangan() {
			$data['title'] = 'Report Data Penerbangan';
			$data['penerbangan'] = $this->models('penerbangan_model')->getDataPenerbangan();

			$this->views('templates/header', $data);
			$this->views('report/data_penerbangan', $data);
			$this->views('templates/footer');
		}
	}

?>