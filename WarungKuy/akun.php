<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WarungKuy-Akun</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/i.png" rel="icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand - v4.9.1
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">WarungKuy</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class=" " href="index.php">Home</a></li>
          <li><a href="fitur.php">Fitur</a></li>
          <li><a class="active" href="Akun.php">Akun Saya</a></li>
          <li><a href="Masuk.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= FeatPricingures Section ======= -->
    <div class="hero-section inner-page">
      <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path
                d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z"
                id="Path"></path>
            </g>
          </g>
        </svg>

      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Selamat Datang</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Halo, Raden Roni</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <section class="section">
      <div class="container">

        <div class="row justify-content-center text-center">
          <div class="col-md-7 mb-5">
            <h2 class="section-heading mb-5">Akun</h2>
          </div>
        </div>
        <div>
          <form method="post" class="row justify-content-center" enctype="multipart/form-data" action="">
            <div class="col-md-5 border-right">
              <div class="p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="d-flex flex-row align-items-center">
                  <div class="col-3">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                      <img class="rounded-circle" id="foto-profile" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    </div>
                  </div>
                  <div class="offset-2 col-7">
                    <label class="labels mb-2">Masukan Foto</label>
                    <input type="file" class="form-control" placeholder="Email" value="" onchange="changeImage(this)">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12"><label class="labels mb-2">Nama</label><input type="text" class="form-control"
                      placeholder="Nama Lengkap" value=""></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12"><label class="labels mb-2">Username</label><input type="text"
                      class="form-control" placeholder="Username" value=""></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12"><label class="labels mb-2">Email</label><input type="text" class="form-control"
                      placeholder="Email" value=""></div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save
                    Profile</button></div>
              </div>
            </div>
          </form>
      </div>
    </section>

   
      <div class="row justify-content-center text-center mt-5 py-5">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright WarungKuy. All Rights Reserved</p>
          <div class="credits">
            Designed by <a href=>WarungKuy Creative</a>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function changeImage(file) {
      const foto = file.files[0];
      const frameFoto = document.getElementById("foto-profile");
      frameFoto.setAttribute("src", window.URL.createObjectURL(foto));
    }
  </script>

</body>

</html>