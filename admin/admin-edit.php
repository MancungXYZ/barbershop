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

//melakukan query
$id = $_GET['Id_Produk'];
$sql = "Select * From produk where Id_Produk = '$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    if (!empty($_FILES['foto_produk']['name'])) {

        $c_image = $_FILES['foto_produk']['name'];
        $c_image_temp = $_FILES['foto_produk']['tmp_name'];
        move_uploaded_file($c_image_temp, "../upload/$c_image");
        $c_update = "update produk set Nama_Produk='$nama_produk', Harga_Produk='$harga', Kategori_Produk='$kategori',  Foto_Produk= '$c_image'
         where Id_Produk='$id'";
    } else {

        $c_update = "update produk set Nama_Produk='$nama_produk', Harga_Produk='$harga', Kategori_Produk='$kategori' where Id_Produk='$id'";
    }
    $run_update = mysqli_query($koneksi, $c_update);
    echo "<script>alert('Selamat! Data berhasil diupdate.')</script>";
    header("Location: ../admin/index.php");
}



?>

<body>
    <div class="container" style="margin-top:20px">
        <h2>Edit Produk</h2>

        <hr>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" name="nama_produk" value="<?php echo $data['Nama_Produk']; ?>" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="number" min="1" step="any" name="harga" value="<?php echo $data['Harga_Produk']; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori Produk</label>
                <div class="col-sm-10 mt-3">
                    <input type="text" name="kategori" value="<?php echo $data['Kategori_Produk']; ?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-10 mt-3">
                    <img src="../upload/<?php echo $data['Foto_Produk']; ?>" alt="<?php echo $data['Nama_Produk']; ?>" width="75%">
                    <input type="file" name="foto_produk" class="form-control">
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