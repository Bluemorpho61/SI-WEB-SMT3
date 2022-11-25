<?php
require ('../Config/koneksi.php');

if (isset($_POST['update'])){
$username =$_POST['username'];
$email =$_POST['email'];

$query ="UPDATE tb_users SET username='$username', email='$email', $";

}