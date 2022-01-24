<?php

require 'koneksi.php';

session_start();
if (!isset($_SESSION['username']) && $_SESSION['status'] !== 'Pelanggan') {
    echo "<script>alert('Silahkan untuk login terlebih dahulu')</script>";
    header("Location: login.php");
}

// if (isset($_SESSION['booked'])) {
//     echo "<script>alert('Telah melakukan reservasi')</script>";
//     sleep(5);
//     header("Location: index.php");
// }

if (isset($_POST['booking'])) {
    $_SESSION['booked'] = TRUE;
    $nama_lengkap = $_POST['name'];
    $alamat_lengkap = $_POST['alamat'];
    $handphone = $_POST['handphone'];
    $kode = $_POST['kode'];
    $tipe_antrian = $_POST['tipe'];

    $get_antri = "Select No_Antrian from pelanggan ORDER BY No_Antrian DESC";
    $result = mysqli_query($koneksi, $get_antri);
    $row = mysqli_fetch_assoc($result);
    $ambil = $row['No_Antrian'];
    $i = $ambil + 1;


    if ($kode == "AeZAkMi") {
        $sql = "SELECT * FROM pelanggan WHERE No_Antrian = '$i' ";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {

            $sql = "INSERT INTO pelanggan (Nama_Pelanggan, Alamat, Handphone, No_Antrian, Tipe_Antrian)
                    VALUES ('$nama_lengkap', '$alamat_lengkap', '$handphone', '$i', '$tipe_antrian')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Selamat, data reservasi berhasil tersimpan!')</script>";
                header("Location: index.php#gaya-rambut");
                $nama_lengkap = "";
                $alamat_lengkap = "";
                $handphone = "";
                $kode = "";
                $tipe_antrian = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        }
    } else {
        echo "<script>alert('Kode konfirmasi tidak sesuai')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Reservasi | KAI</title>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg rounded">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Reservasi</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Nama Lengkap</label>
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo $_SESSION['nama_lengkap']; ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Alamat Lengkap</label>
                                    <input id="alamat" type="text" class="form-control" name="alamat" value="" required>
                                    <div class="invalid-feedback">
                                        Alamat is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">No Handphone</label>
                                    <input id="handphone" type="tel" class="form-control" name="handphone" required>
                                    <div class="invalid-feedback">
                                        No Handphone is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Tipe Antrian</label>
                                    <select class="form-select" name="tipe" aria-label="Default select example" required>
                                        <option selected>Pilih Tipe Antrian</option>
                                        <option value="Home">Barber At Home</option>
                                        <option value="Barber">Barber At Store</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Tipe Antrian is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Masukan Kode Dibawah ini</label>
                                    <p>AeZAkMi</p>
                                    <input id="kode" type="text" class="form-control" name="kode" required>
                                    <div class="invalid-feedback">
                                        Kode is required
                                    </div>
                                </div>

                                <div class="align-items-center d-flex">
                                    <button type="submit" name="booking" class="btn btn-primary ms-auto">
                                        Register
                                    </button>
                                    <button type="button" name="kembali" onclick="location.href='index.php'" class="btn btn-primary" style="margin-left: 30px;">
                                        kembali
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2022 &mdash; Barbershop KAI
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>