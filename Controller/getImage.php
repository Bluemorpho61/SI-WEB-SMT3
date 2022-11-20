<?php
include ('../Config/koneksi.php');
include ('../View/DetailProfileUser.php');
$query_gambar ="SELECT foto FROM tb_users WHERE id_user=$id_user";
$hasil =mysqli_query($koneksi, $query_gambar);
$row = mysqli_fetch_assoc($hasil);
header("Content-type: image/jpeg");
echo $row['foto'];


