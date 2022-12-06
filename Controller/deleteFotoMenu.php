<?php
include ('../Config/koneksi.php');

$id_warung =$_GET['id'];
$id =$_GET['menu'];

$querygetResourceName ="SELECT foto_menu FROM tb_fotomenu WHERE id_fotomenu=$id";
$hsl =mysqli_query($koneksi, $querygetResourceName);
$nama =$hsl->fetch_assoc()['foto_menu'];
unlink("../Assets/img/".$nama);

$query ="DELETE FROM tb_fotomenu WHERE id_fotomenu=$id";
$result = mysqli_query($koneksi, $query);
if ($result){
header("Location:../View/EditInfoWarung.php?id=$id_warung");
}else{
?><script>alert("Hapus Foto Gagal!")</script><?php
    header("Refresh:0");
}