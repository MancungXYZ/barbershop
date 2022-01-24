<?php
session_start();

require 'koneksi.php';


if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang anda masih kosong');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <title>Keranjang Belanja | Barbershop KAI</title>
</head>
<?php
if (isset($_POST["check"])) {
    if ($koneksi->connect_errno == 0) {
        // Bersihkan data
        $id_transaksi = rand(100, 10000);
        $Pelanggan = $_POST["nama_pelanggan"];
        $antri = $_POST["no_antri"];
        header("Location: checkout.php?id_transaksi=$id_transaksi");
    }
}
?>

<body>
    <section>
        <div class="container">
            <br>
            <h2 class="text-center mt-5">Keranjang Transaksi</h2>
            <hr>
            <form action="" method="POST">


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label mt-3">Nama Pelanggan</label>
                    <div class="col-sm-3 mt-3">
                        <input type="text" value="<?php echo $_SESSION['nama_lengkap'] ?>" name="nama_pelanggan" class="form-control" size="4" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label mt-3">No Antrian</label>
                    <div class="col-sm-3 mt-3">
                        <input type="number" value="<?php echo $_SESSION['no_antrian'] ?>" name="no_antri" min="1" max="15" class="form-control" size="4" required>
                    </div>
                </div>
                <a href="checkout.php">
                    <input type="submit" name="check" class="btn btn-success fas-fa-print mt-3" value="Checkout">
                </a>
        </div>

        <br>

        <div class="container shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['hapus-keranjang'])) {
                        session_start();

                        $id_produk = $_GET["id_produk"];
                        unset($_SESSION["keranjang"][$id_produk]);

                        echo "<script>alert('Menu berhasil dihapus dari keranjang');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                    <?php $no = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <?php
                        $ambil = $koneksi->query("Select * From produk Where Id_Produk = $id_produk");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['Harga_Produk'] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $pecah['Nama_Produk'] ?></td>
                            <td>Rp. <?php echo number_format($pecah['Harga_Produk']) ?></td>
                            <td><?php echo $jumlah ?></td>
                            <td>Rp. <?php echo number_format($subharga) ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xn" name="hapus-keranjang">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php#gaya-rambut" class="btn btn-primary mt-3">Lanjut Belanja</a>
            <a href="checkout.php">
                <input type="submit" name="check" class="btn btn-success fas-fa-print mt-3" value="Checkout">
            </a>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false
            });
        });
    </script>
</body>

</html>