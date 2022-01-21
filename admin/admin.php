<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Barbershop KAI | Admin</title>
</head>

<?php
require '../koneksi.php';
session_start();
if (isset($_POST['submit'])) {

    #ambil data
    $uploadOk = 1;

    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    #upload directory path
    $uploads_dir = '../upload';

    $allowedFiles =  array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES["foto_produk"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowedFiles)) {
        echo 'Error, format foto salah';
    } else {
        if ($_FILES["foto_produk"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        } else {
            #file name with a random number so that similar dont get replaced
            $pname = rand(1000, 10000) . "-" . $_FILES["foto_produk"]["name"];

            #temporary file name to store file
            $tname = $_FILES["foto_produk"]["tmp_name"];


            #TO move the uploaded file to specific location
            move_uploaded_file($tname, $uploads_dir . '/' . $pname);

            #sql query to insert into database
            $sql = "INSERT into produk (Nama_Produk, Harga_Produk, Kategori_Produk, Foto_Produk)
    VALUES('$nama_produk','$harga', '$kategori', '$pname')";

            if (mysqli_query($koneksi, $sql)) {

                echo "File Sucessfully uploaded";
            } else {
                echo "Maaf terjadi kesalahan";
            }
        }
    }
}
?>

<body>
    <div class="container" style="margin-top:20px">
        <h2>Tambah Produk</h2>

        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" name="nama_produk" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="number" min="1" step="any" name="harga" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" name="kategori" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="file" name="foto_produk" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10 mt-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <input type="button" onClick="javascript:history.back()" class="btn btn-primary" value="Kembali">
                </div>
            </div>
        </form>

    </div>