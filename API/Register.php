<?php
require ('../Config/koneksi.php');
$username =$_POST['username'];
$email =$_POST['email'];
$pass =$_POST['password'];
$query ="INSERT INTO tb_users VALUES('NULL','$username','$email','$pass','registered',NULL,NULL)";
$stm =$koneksi->prepare($query);
$result =$stm->execute();
if ($result){
    $response['value']=1;
    $response['message']='Registrasi Berhasil';
    echo json_encode($response);
}else{
    $response['value']=0;
    $response['message']='Registrasi Gagal';
    echo json_encode($response);
}
