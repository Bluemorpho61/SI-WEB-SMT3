<?php
include ('../Config/koneksi.php');
$id =$_GET['id_warung'];
$query ="DELETE FROM tb_warung WHERE id_warung='$id'";
if ($query){
header('Location:../View/KelolaWarung.php');
}else{
?><script>
alert("Hapus data gagal!");
</script>
<?php
    header("Location:../View/KelolaWarung.php");
}