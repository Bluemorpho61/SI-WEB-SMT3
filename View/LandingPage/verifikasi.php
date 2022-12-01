<?php

require_once("config/database.php");

if($_GET["email"]){
    $email = $_GET["email"];

    // ganti status user menjadi aktif
    $sql = "UPDATE tb_users SET status = 'aktif' WHERE email = '$email'";
    $updated = mysqli_query($koneksi, $sql);
    if($updated){
        echo "<script>alert('Akun anda berhasil berivikasi silahkan login!')</script>";
    }else{
        echo "<script>alert('Akun anda gagal berivikasi!')</script>";
    }

    header("Location: http://localhost/SI-WEB-SMT3/Warungkuy/Masuk.php");
}