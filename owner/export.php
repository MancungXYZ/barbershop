<?php

include "../koneksi.php";
require_once '../dompdf/autoload.inc.php';


use Dompdf\Dompdf;

$dompdf = new Dompdf();

$sql = mysqli_query($koneksi, "SELECT * FROM transaksi") or die(mysqli_error($koneksi));
$html = '<center><h2>Laporan Penghasilan Barbershop KAI</h2></center><hr/><br/>';

$html .= '<table border="1" width="100%">
                <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Id Produk</th>
					<th>Id Pengguna</th>
					<th>Jumlah Barang</th>
					<th>Total Bayar</th>
                    <th>Tanggal Transaksi</th>
				</tr>';
$no = 1;
while ($data = mysqli_fetch_assoc($sql)) {
    //menampilkan data perulangan
    $html .= '<tr>
                    <td>' . $no . '</td>
                    <td>' . $data['Id_Transaksi'] . '</td>
                    <td>' . $data['Id_Produk'] . '</td>
                    <td>' . $data['Id_Pengguna'] . '</td>
                    <td>' . $data['Quantity'] . '</td>
                    <td> Rp.' . $data['Total_Bayar'] . '</td>
                    <td>' . $data['Tgl_Transaksi'] . '</td>
                            </tr>';
    $no++;
}
$sql = mysqli_query($koneksi, "SELECT SUM(Total_Bayar) AS laba From transaksi");
$pendapatan = $sql->fetch_object()->laba;

$html .= '<tr>
                        <td colspan="6">Total Pendapatan</td>
                        <td>Rp. ' . $pendapatan . '</td>
                    </tr>';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan_Barbershop.pdf');
//Otomatis keluar
echo "<script>window.close();</script>";
