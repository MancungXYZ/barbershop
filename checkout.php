<?php
session_start();

require 'koneksi.php';

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Tidak ada barang yang dibeli');</script>";
    echo "<script>location='index.php#menu';</script>";
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>Checkout</title>
</head>

<body>

    <style>
        @media print {

            /* Hide every other element */
            body * {
                visibility: hidden;

            }

            /* Then Display print container */
            .print-container,
            .print-container * {
                visibility: visible;
            }
        }
    </style>


    <section class="print-container">
        <div class="container shadow p-5 mt-2 bg-body rounded">
            <form action="" method="post">
                <br>
                <h3 class="text-center mt-3">Checkout Barbershop</h3>
                <hr>
                <?php
                $id_transaksi = $_GET['id_transaksi'];
                ?>

                <div class="row">
                    <div class="col">
                        <p>Nama Pelanggan : <?php echo $_SESSION['nama_lengkap'] ?></p>
                        <p>No Antrian : <?php echo $_SESSION['no_antrian']; ?></p>
                        <p>No Transaksi : <?php echo $id_transaksi ?></p>
                    </div>
                    <div class="col">
                        <p class="text-end">Tanggal Transaksi : <?php echo $tgl = date("Y-m-d"); ?></p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id_Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Quantity</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $totalHarga = 0; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                            <?php
                            $ambil = $koneksi->query("Select * From produk Where Id_Produk = $id_produk");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah['Harga_Produk'] * $jumlah;
                            $nama_pelanggan = $_SESSION['nama_lengkap'];

                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $id_produk; ?></td>
                                <td><?php echo $pecah['Nama_Produk']; ?></td>
                                <td>Rp. <?php echo number_format($pecah['Harga_Produk']) ?></td>
                                <td><?php echo $jumlah ?></td>
                                <td>Rp. <?php echo number_format($subharga) ?></td>
                            </tr>
                            <?php $totalHarga += $subharga; ?>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan=5>Total Harga</th>
                            <th>Rp. <?php echo number_format($totalHarga); ?></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                    <div class="col">
                        <p>Terima Kasih telah berkunjung</p>
                    </div>
                    <div class="col text-end">
                        <p>Hormat Kami</p>
                        <br>
                        <p>Barbershop KAI</p>
                    </div>
                </div>

                <input type="submit" name="cetak" class="btn btn-success mt-3" value="Cetak">
            </form>
        </div>

        <?php
        if (isset($_POST["cetak"])) {
            if ($koneksi->connect_errno == 0) {
                //mengambil id_pengguna
                $id_pengguna = $_SESSION['pengguna'];
                //tanggal
                $tgl = date("Y-m-d");

                //testing insert pembelian
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :

                    $sql = mysqli_query($koneksi, "INSERT INTO transaksi (Id_Transaksi, Id_Produk, Id_Pengguna, Quantity, Total_Bayar, Tgl_Transaksi) VALUES ('$id_transaksi', '$id_produk', '$id_pengguna', '$jumlah', '$totalHarga', '$tgl')");

                endforeach;

                echo "<script>alert('Cetak dalam proses')</script>";
                echo "<script>window.print()</script>";
                session_destroy();
            } else
                echo "<script>alert('Koneksi Database gagal')</script>";
        }


        ?>


    </section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>