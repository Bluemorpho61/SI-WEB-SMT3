<?php
session_start();
include('../Config/koneksi.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hak = 'registered';
    $query = "INSERT INTO tb_users VALUES ('','$username','$email','$password','registered','','')";
    mysqli_query($koneksi,$query);
}else{
    echo "Input data gagal";
}
//    if ($result =!mysqli_query($koneksi, $query)) {
//        echo "Input data gagal";
//        mysqli_errno($result);
//   }
//}else{
//    echo "Input data sukses";
//}


