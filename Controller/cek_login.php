<?php
$koneksi =mysqli_connect("localhost", "root", "", "db_warungkuy");
session_start();
if (isset($_POST['submit'])){
    $email=$_POST['email-log'];
    $pass=$_POST['pass-log'];

    if (!empty(trim($email))&& !empty(trim($pass))){
        $query="SELECT * FROM tb_users WHERE email ='$email'";
        $result=mysqli_query($koneksi,$query);
        $num =mysqli_num_rows($result);
        while ($row =mysqli_fetch_array($result)){
            $id =$row['id_user'];
            $userVal=$row['email'];
            $pasVal=$row['password'];
            $level=$row['hak'];
        }
        if ($num !=0){
            if ($userVal==$email &&$pasVal==$pass&&$level=='admin'){
                //  header('Location: home.php?user_fullname='. urldecode($userName));
                $_SESSION['id_user']=$id;
                $_SESSION['email']=$userVal;
                $_SESSION['password']=$pasVal;
                $_SESSION['hak']=$level;
                header('Location: ../View/index.php');
            }else{
                $error='user atau password salah!!';
                header('Location: ../View/LoginPage.html');
            }
        }else{
            $error='user tidak ditemukan';
            echo $error;
        }
    }

}
