<?php  
	class Flasher {
		static function setFlash($pesan, $aksi, $tipe) {
			$_SESSION['flash'] = [
				'pesan' => $pesan,
				'aksi' => $aksi,
				'tipe' => $tipe
			];
		}

		static function flash() {
			if (isset($_SESSION['flash'])) {
				echo '<div class="alert alert-'.$_SESSION['flash']['tipe'].' alert-dismissible fade show" role="alert">
								'.$_SESSION['flash']['pesan'].' <strong>'.$_SESSION['flash']['aksi'].'</strong>
							</div>';
				// hapus session (hanya dilakukan sekali)
				unset($_SESSION['flash']);
			}
		}
	}

?>