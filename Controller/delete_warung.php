<?php
include('../Config/koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM tb_warung WHERE id_warung='$id'";
$query = mysqli_query($koneksi, $query);
if ($query) {
    header("Location:../View/KelolaWarung.php");
} else {
    ?>
    <script>
        alert("Hapus data gagal");
    </script><?php
    header("Location:../View/KelolaWarung.php");
}