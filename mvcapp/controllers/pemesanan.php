<?php  
	session_start();

	if (!isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/login');
		exit;
	}
	
	class Pemesanan extends Controller {
		// halaman data pemesanan
		function index() {
			$data['title'] = 'Pemesanan';
			$data['pemesan'] = $this->models('pemesan_model')->getDataPemesan();

			$this->views('templates/header', $data);
			$this->views('datapemesanan/halaman_pemesanan', $data);
			$this->views('templates/footer');
		}

		// halaman tambah data pemesanan
		function tambah_data() {
			$data['jenis'] = $this->models('penerbangan_model')->getDataPenerbangan();
			$data['title'] = 'Tambah Data';

			$this->views('templates/header', $data);
			$this->views('datapemesanan/tambah_dt_pemesanan', $data);
			$this->views('templates/footer');
		}
		function proses_tambah() {
			if ($this->models('pemesan_model')->tambahDataPemesan($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'disimpan!', 'success');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'disimpan!', 'danger');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			}
		}

		// proses delete data
		function delete_data($id) {
			if ($this->models('pemesan_model')->deleteDataPemesan($id) > 0) {
				Flasher::setFlash('Data berhasil', 'dihapus!', 'success');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'dihapus!', 'danger');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			}
		}

		// halaman edit data pemesanan
		function edit_data($id) {
			$data['title'] = 'Edit Data';
			$data['data'] = [
				"dataPen" => $this->models('penerbangan_model')->getDataPenerbangan(),
				"dataPem" => $this->models('pemesan_model')->getDataEdit($id)
			];

			$this->views('templates/header', $data);
			$this->views('datapemesanan/edit_dt_pemesanan', $data);
			$this->views('templates/header');
		}
		function proses_edit() {
			if ($this->models('pemesan_model')->editDataPemesan($_POST) > 0) {
				Flasher::setFlash('Data berhasil', 'diubah!', 'success');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			} else {
				Flasher::setFlash('Data gagal', 'diubah!', 'danger');
				header('Location: '. URL_UTAMA .'/pemesanan');
				exit;
			}	
		}

		// cetak data
		function Cetak_Data_Pemesan() {
			$data['title'] = 'Report Data Pemesanan';
			$data['pemesan'] = $this->models('pemesan_model')->getDataPemesan();

			$this->views('templates/header', $data);
			$this->views('report/data_pemesanan', $data);
			$this->views('templates/footer');
		}
	}

?>