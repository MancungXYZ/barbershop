<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Barbershop KAI">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Login | Barbershop KAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <?php
    require 'koneksi.php';
    session_start();


    if (isset($_POST['submit'])) {

        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $get_user = "select * from pengguna where Username = '$username'";
        $result = mysqli_query($koneksi, $get_user);

        $get_antri = "Select No_Antrian from pelanggan ORDER BY No_Antrian DESC";
        $hasil = mysqli_query($koneksi, $get_antri);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = mysqli_fetch_assoc($hasil);

            if ($row['Status'] == 'Pelanggan') {

                $_SESSION['pengguna'] = $row['id_Pengguna'];
                $_SESSION['no_antrian'] = $data['No_Antrian'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['status'] = $row['Status'];
                $_SESSION['nama_lengkap'] = $row['Nama_lengkap'];
                $_SESSION['loggedin'] = TRUE;
                header("Location: reservasi.php");
            }
            if ($row['Status'] == 'Kasir') {

                $_SESSION['no_antrian'] = $data['No_Antrian'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['nama_lengkap'] = $row['Nama_lengkap'];
                $_SESSION['status'] = $row['Status'];
                $_SESSION['loggedin'] = TRUE;
                header("Location: kasir.php");
            }
            if ($row['Status'] == 'Barbermen') {

                $_SESSION['no_antrian'] = $data['No_Antrian'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['nama_lengkap'] = $row['Nama_lengkap'];
                $_SESSION['status'] = $row['Status'];
                $_SESSION['loggedin'] = TRUE;
                header("Location: barber.php");
            }
            if ($row['Status'] == 'Owner') {

                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['nama_lengkap'] = $row['Nama_lengkap'];
                $_SESSION['status'] = $row['Status'];
                $_SESSION['loggedin'] = TRUE;
                header("Location: owner/index.php");
            }
            if ($row['Status'] == 'Admin') {

                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['nama_lengkap'] = $row['Nama_lengkap'];
                $_SESSION['status'] = $row['Status'];
                $_SESSION['loggedin'] = TRUE;
                header("Location: admin/index.php");
            }
        }
    }

    ?>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Username</label>
                                    <input type="text" class="form-control" name="username" required autofocus>
                                    <div class="invalid-feedback">
                                        Username is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="forgot.html" class="float-end">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary ms-auto">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="kembali text-center">
                            <h5><a href="index.php">Kembali</a></h5>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Don't have an account? <a href="register.php" class="text-dark">Create One</a>
                            </div>
                        </div>

                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2022 &mdash; Barbershop KAI
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>