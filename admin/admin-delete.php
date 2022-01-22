<?php
require '../koneksi.php';
if (isset($_GET['Id_Produk'])) {
	$querySelect = "select * from produk where Id_Produk = " . $_GET['Id_Produk'];
	$ResultSelectStmt = mysqli_query($koneksi, $querySelect);
	$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

	$fetchImgTitleName = $fetchRecords['Foto_Produk'];

	$createDeletePath = "../upload/" . $fetchImgTitleName;

	if (unlink($createDeletePath)) {
		$liveSqlQQ = "delete from produk where Id_Produk = " . $fetchRecords['Id_Produk'];
		$rsDelete = mysqli_query($koneksi, $liveSqlQQ);

		if ($rsDelete) {
			echo "Hapus data berhasil";
			header("refresh:5;url=index.php");
		}
	} else {
		echo "Woops, Terjadi keselahan internal";
		header("refresh:5;url=index.php");
	}
}
