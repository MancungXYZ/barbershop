<?php require 'koneksi.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- My Css -->
  <link rel="stylesheet" href="assets/styles.css">
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&family=Readex+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&family=Quicksand:wght@300;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Quicksand:wght@300;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Google Icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>Barbershop | KAI</title>
</head>

<body>
  <div class="preloader">
    <div class="loading">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light shadow p-3 fixed-top" style="background-color: white;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Barbershop KAI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-item nav-link active" href="#">Home</span></a>
          <a class="nav-item nav-link" href="#services">Services</a>
          <a class="nav-item nav-link" href="#gaya-rambut">Product & Style</a>
          <a class="nav-item nav-link" href="#about">About Us</a>
          <a class="nav-item nav-link" href="#booking">Reserve</a>
          <a class="nav-item btn btn-primary btn-lg" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Jumbrotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container md:w-1/2 w-3/4 h-4/5 m-10 text-center flex textshadow">
      <div class="flex flex-col justify-center items-center h-full">
        <h1 class="display-4 m-auto">WELCOME TO BARBERSHOP KAI</h1>
        <p class="text-white text-2xl">Kami adalah professional barbershop yang bisa membuat anda menjadi lebih tampan</p>
      </div>
    </div>
  </div>
  <!-- End Jumbotron -->

  <!-- Our Service -->
  <section id="services">
    <div class="container">
      <div class="gambar-kumis flex items-center justify-center">
        <img src="kumis.png" alt="Kumis" width="75">
      </div>
      <div class="layanan mt-2">
        <div class="row">
          <div class="col">
            <h1 class="text-center text-3xl">Our Barber Services</h1>
          </div>
        </div>
      </div>
      <div class="row mt-2 servise">
        <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card shadow" style="width: 18rem;">
            <img src="img/service1.jpg" class="card-img-top" alt="Service1">
            <div class="card-body text-center">
              <h5 class="card-title">Potongan Pria</h5>
              <p class="card-text">Potongan menyeluruh sesuai dengan penampilan professional anda</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card shadow" style="width: 18rem;">
            <img src="img/service2.jpg" class="card-img-top" alt="service2">
            <div class="card-body text-center">
              <h5 class="card-title">Perawatan Janggut</h5>
              <p class="card-text">Pertahankan janggut anda dalam potongan yang prima</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card shadow" style="width: 18rem;">
            <img src="img/Service3.jpg" class="card-img-top" alt="service3">
            <div class="card-body text-center">
              <h5 class="card-title">Perawatan Rambut</h5>
              <p class="card-text">Dapatkan perawatan rambut kelas atas oleh para professional kami</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service -->

  <!-- Product & Hair Style -->
  <section id="gaya-rambut">
    <div class="container-fluid">
      <div class="gambar-kumis flex items-center justify-center">
        <img src="kumis.png" alt="Kumis" width="75">
      </div>
      <div class="layanan mt-2">
        <div class="row">
          <div class="col">
            <h1 class="text-center text-3xl">Product & Hair Styles</h1><br>
          </div>
        </div>
        <div class="row">
          <?php $ambil = $koneksi->query("Select * From produk"); ?>
          <?php while ($permenu = $ambil->fetch_assoc()) { ?>

            <div class="col-md-4 mb-3 d-flex justify-content-center text-center">
              <div class="card shadow" style="width: 18rem;">
                <img src="upload/<?php echo $permenu['Foto_Produk']; ?>" class="card-img-top" alt="Produk">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $permenu['Nama_Produk']; ?></h5>
                  <p class="card-text mb-3">Rp. <?php echo number_format($permenu['Harga_Produk']); ?></p>
                  <a href="beli.php?id=<?php echo $permenu['Id_Produk']; ?>" type="button" class="btn btn-primary">Beli</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hair Style -->

  <!-- About Us -->
  <section id="about">
    <div class="container-fluid">
      <div class="row">
        <div class="tentang col">
          <h5>About Us</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h1>Kami bergerak pada bidang jasa cukur rambut pria, produk perawatan, dan perawatan penampilan pria</h1>
        </div>
      </div>
    </div>


  </section>
  <img class="about" src="img/about.jpg" alt="About">

  <!-- End About us -->

  <!-- Reserve -->
  <section id="booking">
    <div class="container-fluid">
      <div class="gambar-kumis mb-3 flex items-center justify-center">
        <img src="kumis.png" alt="Kumis" width="75">
      </div>
      <div class="reserve">
        <div class="row">
          <div class="col text-center" style="margin-bottom: 50px;">
            Tunggu Apalagi, Pesan Online Sekarang
          </div>
        </div>
        <div class="row text-center mt-3">
          <a class="btn btn-primary btn-lg" href="reservasi.php">RESERVE</a>
        </div>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,202.7C384,203,480,181,576,181.3C672,181,768,203,864,224C960,245,1056,267,1152,272C1248,277,1344,267,1392,261.3L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
  <!-- End Reserve -->

  <!-- Footer -->
  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Barbershop KAI Merupakan sebuah usaha yang bergerak dibidang jasa cukur rambut maupun transaksi produk perawatan khususnya rambut pria</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Kontak</h6>
          <ul class="footer-links">
            <li><i class="fas fa-phone-alt"></i> Telepon : (0232) 123456</li>
            <li><i class="fas fa-envelope"></i> Email : barbershopkai@gmail.com</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#services">Services</a></li>
            <li><a href="#gaya-rambut">Product & Styles</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#booking">Reserve</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    $('.nav-link').click(function() {
      $('.nav-link').removeClass('active');
      $(this).addClass('active');
    })
  </script>
  <script>
    $(document).ready(function() {
      $(".preloader").fadeOut("slow");
    });
  </script>
  <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</body>

</html>