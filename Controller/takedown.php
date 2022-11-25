<?php
include('../Config/koneksi.php');
$id = $_GET['id'];
$query = "DELETE FROM tb_users WHERE id_user='$id'";
$query = mysqli_query($koneksi, $query);
if ($query) {
    header("Location:../View/tables.php");
} else {
    ?>
    <script>
        alert("Hapus data gagal");
    </script><?php
    header("Location:../View/tables.php");
}
