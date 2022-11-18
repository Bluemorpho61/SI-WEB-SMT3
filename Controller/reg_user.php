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
    header("Location:../View/LoginPage.html");
}else{
    ?><script>
        alert("Proses Registrasi Gagal");
        header("Location:../View/Register.php");
    </script><?php
}
//    if ($result =!mysqli_query($koneksi, $query)) {
//        echo "Input data gagal";
//        mysqli_errno($result);
//   }
//}else{
//    echo "Input data sukses";
//}


