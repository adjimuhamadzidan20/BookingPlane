<?php
	session_start();

	if (!isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/login');
		exit;
	}

	class Jadwal extends Controller {
		// halaman data jadwal
		function index() {
			$data['title'] = 'Jadwal Keberangkatan';
			$data['jadwal'] = $this->models('jadwal_model')->getDataJadwal();

			$this->views('templates/header', $data);
			$this->views('jadwal/jadwal_keberangkatan', $data);
			$this->views('templates/footer');
		}

		// halaman tambah jadwal
		function tambah_data() {
			$data['title'] = 'Tambah Data';
			$data['data'] = [
				"pemesan" => $this->models('pemesan_model')->getDataPemesan(),
				"pesawat" => $this->models('pesawat_model')->getDataPesawat()
			];

			$this->views('templates/header', $data);
			$this->views('jadwal/tambah_jadwal', $data);
			$this->views('templates/footer');
		}
		function proses_tambah() {
			if ($this->models('jadwal_model')->tambahJadwal($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'disimpan!', 'success');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'disimpan!', 'danger');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			}
		}

		// halaman edit jadwal
		function edit_data($id) {
			$data['title'] = 'Edit Data';
			$data['data'] = [
				"pemesan" => $this->models('pemesan_model')->getDataPemesan(),
				"pesawat" => $this->models('pesawat_model')->getDataPesawat(),
				"jadwal" => $this->models('jadwal_model')->getDataEdit($id)
			];

			$this->views('templates/header', $data);
			$this->views('jadwal/edit_jadwal', $data);
			$this->views('templates/footer');
		}
		function proses_edit() {
			if ($this->models('jadwal_model')->editJadwal($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'diubah!', 'success');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'diubah!', 'danger');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			}	
		}

		// proses delete data jadwal
		function delete_data($id) {
			if ($this->models('jadwal_model')->deleteJadwal($id) > 0) {
				Flasher::setFlash('Data berhasil', 'dihapus!', 'success');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'dihapus!', 'danger');
				header('Location: '. URL_UTAMA . '/jadwal');
				exit;
			}
		}

		// cetak data
		function Cetak_Data_Jadwal() {
			$data['title'] = 'Report Jadwal Keberangkatan';
			$data['jadwal'] = $this->models('jadwal_model')->getDataJadwal();

			$this->views('templates/header', $data);
			$this->views('report/data_jadwal', $data);
			$this->views('templates/footer');
		}
	}

?>