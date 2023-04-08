<?php  
	$mpdf = new \Mpdf\Mpdf();

  $head = '<h1 style="margin-bottom: 5px; text-transform: uppercase; font-family: calibri;">Booking Plane</h1>';
  $desc = 'Pemesanan Tiket Penerbangan';
  $line1 = '<hr style="border-style: solid; color: black; height: 1px;">';
  $line2 = '<hr style="border-style: solid; color: black; margin-top: -10px; height: 1px;">';
  $subhead = '<div style="display: flex;">
                <h4>Laporan Data Pemesanan</h4>
                <p style="font-size: 12px;"><i>'.date("j F, Y, g:i a").'</i></p>
              </div>';
	$tabel = '<table border="1" cellspacing="0" cellpadding="4" style="width: 100%; margin-top: 6px; font-size: 14px;">
              <thead>
                  <tr>
                      <th nowrap="nowrap">ID PMS</th>
                      <th nowrap="nowrap">Nama Pemesan</th>
                      <th nowrap="nowrap">Alamat</th>
                      <th nowrap="nowrap">Jenis Penerbangan</th>
                      <th nowrap="nowrap">Jumlah Tiket</th>
                      <th nowrap="nowrap">Harga</th>
                  </tr>
              </thead>
              <tbody>';
              foreach ($data['pemesan'] as $res) :
                  $tabel .= '<tr>
					                      <td style="text-align: center;">'. $res['ID_pemesan'] .'</td>
					                      <td>'. $res['Nama_pemesan'] .'</td>
					                      <td>'. $res['Alamat_pemesan'] .'</td>
					                      <td>'. $res['Jenis_Penerbangan'] .'</td>
                                <td>'. $res['Jumlah_tiket'] .' Tiket</td>
                                <td>Rp. '. $res['Harga_Penerbangan'] .'</td>
					                  </tr>';
              endforeach;
              $tabel .= '</tbody>
          					</table>';

  $date = '<p style="margin-top: 100px; text-align: right;">Jakarta, '.date("j F, Y").'</p>';
  $name = '<p style="margin-top: 66px; text-align: right;">Admin</p>';

  $mpdf->WriteHTML($head);
  $mpdf->WriteHTML($desc);
  $mpdf->WriteHTML($line1);
  $mpdf->WriteHTML($line2);
  $mpdf->WriteHTML($subhead);                  
	$mpdf->WriteHTML($tabel);
  $mpdf->WriteHTML($date);
  $mpdf->WriteHTML($name);
	$mpdf->setFooter('Booking Plane - Hal {PAGENO}');
  $mpdf->Output('Laporan_Data_Pemesanan.pdf', \Mpdf\Output\Destination::INLINE);

?>