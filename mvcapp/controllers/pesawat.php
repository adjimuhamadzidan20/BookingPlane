<?php
	session_start();

	if (!isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/login');
		exit;
	}
  
	class Pesawat extends Controller {
		// halaman data pesawat
		function index() {
			$data['title'] = 'Pesawat';
			$data['pesawat'] = $this->models('pesawat_model')->getDataPesawat();

			$this->views('templates/header', $data);
			$this->views('datapesawat/halaman_pesawat', $data);
			$this->views('templates/footer');
		}

		// halaman tambah data pesawat
		function tambah_data() {
			$data['title'] = 'Tambah Data';

			$this->views('templates/header', $data);
			$this->views('datapesawat/tambah_dt_pesawat');
			$this->views('templates/footer');
		}
		function proses_tambah() {
			$this->models('pesawat_model')->tambahDataPesawat($_POST);
		} 

		// proses delete data 
		function delete_data($id) {
			if ($this->models('pesawat_model')->deleteDataPesawat($id) > 0) {
				Flasher::setFlash('Data berhasil', 'dihapus!', 'success');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit; 
			} else {
				Flasher::setFlash('Data gagal', 'dihapus!', 'danger');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit; 
			}
		} 

		// halaman edit data pesawat
		function edit_data($id) {
			$data['title'] = 'Edit Data';
			$data['pesawat'] = $this->models('pesawat_model')->getDataEdit($id);

			$this->views('templates/header', $data);
			$this->views('datapesawat/edit_dt_pesawat', $data);
			$this->views('templates/footer');
		}
		function proses_edit() {
			if ($this->models('pesawat_model')->editDataPesawat($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'diubah!', 'success');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'diubah!', 'danger');
				header('Location: '. URL_UTAMA .'/pesawat');
				exit;
			}	
		}

		// cetak data
		function Cetak_Data_Pesawat() {
			$data['title'] = 'Report Data Pesawat';
			$data['pesawat'] = $this->models('pesawat_model')->getDataPesawat();

			$this->views('templates/header', $data);
			$this->views('report/data_pesawat', $data);
			$this->views('templates/footer');
		}
	}

?>