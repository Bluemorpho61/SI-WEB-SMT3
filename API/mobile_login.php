<?php
require ('../Config/koneksi.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $response =array();
    $email =$_POST['email'];
    $pass =$_POST['password'];

    $query ="SELECT * FROM tb_users WHERE email='$email' AND password='$pass' AND  hak='registered'";
    $result =mysqli_fetch_array(mysqli_query($koneksi, $query));

    if (isset($result)){
        $response['value']=1;
        $response['message']='login sukses';
        echo json_encode($response);
    }else{
        $response['value']=0;
        $response['message']='login gagal';
        echo json_encode($response);
    }
}