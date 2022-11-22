<?php
require_once("config/dabatabase.php");

session_start();

if(isset($_SESSION['$id'])){
  header("Location: http://localhost/SI-WEB-SMT3/WarungKuy/masuk.php");
}
if(isset($_POST["submit"])){
  
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "INSERT INTO tb_users (nama, username, email, password, hak, foto) VALUES ('$nama', '$username', '$email', '$password', 'registeresi')";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WarungKuy-Daftar</title>
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
          <li><a class="" href="index.php">Home</a></li>
          <li><a href="fitur.php">Fitur</a></li>
          <li><a href="akun.php">Akun Saya</a></li>
          <li><a href="masuk.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="hero-section inner-page">
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
                <h1 data-aos="fade-up" data-aos-delay="">Daftar</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Segera Daftarkan Akun Anda Untuk Coba Aplikasi
                  ini!</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="">
      <div class="container">
        <div class="row mt-5 align-items-end d-flex justify-content-center">
          <div class="col-6" data-aos="fade-up">


            <!-- Nama input -->
            <div class="form-outline mt-5 mb-4 ">
              <input type="nama" id="loginfullname" class="form-control" />
              <label class="form-label" for="loginfullname">Nama Lengkap</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4 ">
              <input type="user" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">Username</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4 ">
              <input type="email" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" class="form-control" />
              <label class="form-label" for="loginPassword">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>Sudah Punya Akun? <a href="Masuk.php">Masuk</a></p>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row justify-content-center text-center py-5">
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

</body>

</html>