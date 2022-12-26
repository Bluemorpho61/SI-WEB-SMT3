<?php
require_once "../Config/koneksi.php";
header('Content type: application/json; charset=utf-8');

if (function_exists($_GET['method'])) {
    $_GET['method']();
}

//make a function to update profile
function updateProfile()
{
    if (isset($_POST)) {
        # code...
        global $koneksi;
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $foto = $_POST['foto'];
        $alamat = $_POST['alamat'];
        $query = mysqli_query($koneksi, "UPDATE tb_users SET username = '$username', email = '$email', alamat='$alamat',foto='$foto' WHERE id_user = '$id'");
        if ($query) {
            echo json_encode([
                "message" => "Update Profile Berhasil"
            ]);
        } else {
            echo json_encode([
                "message" => "Update Profile Gagal"
            ]);
        }
    }

}

?>