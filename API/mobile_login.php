<?php
include ('../Config/koneksi.php');
$email =$_POST['email'];
$password =$_POST['password'];

$query="SELECT * FROM tb_users WHERE email='$email' AND password='$password'";
$result =mysqli_query($koneksi, $query);
$row=mysqli_num_rows($result);
if ($row>0){
    echo json_encode('Login Berhasil');
}else{
    echo json_encode('Login Gagal');
}