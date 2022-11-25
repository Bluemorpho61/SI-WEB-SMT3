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
            $username=$row['username'];
            $emailVal=$row['email'];
            $pasVal=$row['password'];
             $level=$row['hak'];
        }
        if ($num !=0){
            if ($emailVal==$email &&$pasVal==$pass&&$level=='admin'){
               $_SESSION['id_user']=$id;
               $_SESSION['username']=$username;
                $_SESSION['email']=$emailVal;
                $_SESSION['password']=$pasVal;
                $_SESSION['hak']=$level;
                header('Location: ../View/index.php');
            } else if ($emailVal==$email &&$pasVal==$pass&&$level=='registered'){
                $_SESSION['id']=$id;
                $_SESSION['username']=$username;
                $_SESSION['email']=$emailVal;
                $_SESSION['password']=$pasVal;
                $_SESSION['hak']=$level;
                header('Location: ../View/akun.php?id='.$_SESSION['id']);
            }
            else{
                $error='user atau password salah!!';
                header('Location: ../View/masuk.php');
            }
        }else{
            $error='user tidak ditemukan';
            echo $error;
        }
    }

}
