<?php
session_start();
include ('../Config/koneksi.php');

$sesID =$_SESSION['id_user'];
if (isset($_POST['submit'])){
    $tgl=date('Y-m-d H:i:s');

    $namaWarung =$_POST['nama_warung'];
    $alamatWarung =$_POST['alamat_warung'];
    $deskripsi=$_POST['deskripsi'];
    $foto=$_FILES['foto']['tmp_file'];
    $kontenFoto =addslashes(file_get_contents($foto));
    $stmt =$koneksi->prepare("INSERT into tb_warung VALUES ('',?,?,?,?,?)");
    $stmt->bind_param(1,$namaWarung);
    $stmt->bind_param(2, $alamatWarung);
    $stmt->bind_param(3, $kontenFoto);
    $stmt->bind_param(4, $sesID);
    $stmt->bind_param(5,$tgl );
$stmt->execute();
printf($stmt->affected_rows);
}