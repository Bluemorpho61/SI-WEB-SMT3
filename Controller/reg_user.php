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
        echo "<script>alert('Registrasi Berhasil! Silahkan login dengan akun yang telah anda daftarkan')</script>";
        header("Location:../View/Masuk.php");
    }

}else{
    ?><script>
        alert("Proses Registrasi Gagal");
        header("Location:../View/daftar.php");
    </script><?php
}
//    if ($result =!mysqli_query($koneksi, $query)) {
//        echo "Input data gagal";
//        mysqli_errno($result);
//   }
//}else{
//    echo "Input data sukses";
//}


