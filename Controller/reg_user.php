<?php
session_start();
include('../Config/koneksi.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hak = 'registered';
    $query = "INSERT INTO tb_users VALUES ('','$username','$email','$password','registered','','')";
    $result=mysqli_query($koneksi,$query);
    if ($result){
       echo "<script type='text/javascript'>alert('Proses Registrasi Berhasil!');  window.location='../View/masuk.php'</script>";
    }

}else{
    echo "<script type='text/javascript'>alert('Proses Registrasi Gagal!'); window.location='../View/daftar.php'</script>";
}
//    if ($result =!mysqli_query($koneksi, $query)) {
//        echo "Input data gagal";
//        mysqli_errno($result);
//   }
//}else{
//    echo "Input data sukses";
//}


