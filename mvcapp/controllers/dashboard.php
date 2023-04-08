<?php
	session_start();

	if (!isset($_SESSION['dashboard'])) {
		header('Location: '. URL_UTAMA .'/login');
		exit;
	}

	class Dashboard extends Controller {
		// halaman utama dashboard
		function index() {
			$data['title'] = 'Dashboard';
			$data['row'] = [
				"data1" => $this->models('dashboard_model')->jumlahDataPesawat(),
				"data2" => $this->models('dashboard_model')->jumlahDataPenerbangan(),
				"data3" => $this->models('dashboard_model')->jumlahDataPemesan(),
				"data4" => $this->models('dashboard_model')->jumlahDataJadwal()
			];

			// $data['chart'] = [
			// 	"maska"
			// ]

			$this->views('templates/header', $data);
			$this->views('dashboard/index', $data);
			$this->views('templates/footer');
		}
	}

?>