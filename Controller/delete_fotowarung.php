<?php
include ('../Config/koneksi.php');
$foto = $_GET['foto'];
$id=$_GET['id'];
$query ="DELETE FROM tb_fotowarung WHERE id_fotowarung=$foto";
$result =mysqli_query($koneksi,$query);
if ($result){
header("Location:../View/EditInfoWarung.php?id=$id");
}else{
    ?><script>alert("Hapus Foto gagal")</script>
<?php
    header("Location:../View/EditInfoWarung?id=$id");
}