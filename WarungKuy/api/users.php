<?php
require_once "../config/database.php";

header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['method'])) {
    if (function_exists($_GET['method'])) {
        $_GET["method"]();
    }
}else {
    header("Location: http://localhost/SI-WEB-SMT3/WarungKuy");
}

function getAll(){
    global $koneksi;
    $users = mysqli_query($koneksi, "SELECT * FROM tb_users");
    
    $users_data = [];

    if($users->num_rows){
        while(($row = $users->fetch_assoc())) {
            $users_data[] = $row;
          }
    };
    echo(json_encode([
        "status" => "OK",
        "data" => $users_data
    ]));
    exit;
}

function getById(){
    global $koneksi;
    if (!isset($_GET["id"])) {
        echo(json_encode([
            "status" => "ERR",
            "data" => "Invalid request!"
        ]));
        exit;
    }
    $id = $_GET["id"];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE id_user = '$id'");
    if($user->num_rows){
        $row = mysqli_fetch_assoc($user);
        echo(json_encode([
            "status" => "OK",
            "data" => $row
        ]));
        exit;
    }else {
        echo(json_encode([
            "status" => "OK",
            "data" => "user tidak tersedia"
        ]));
        exit;
    };
}
function getByEmail(){
    global $koneksi;
    if (!isset($_GET["email"])) {
        echo(json_encode([
            "status" => "ERR",
            "data" => "Invalid request!"
        ]));
        exit;
    }
    $email = $_GET["email"];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email = '$email'");
    if($user->num_rows){
        $row = mysqli_fetch_assoc($user);
        echo(json_encode([
            "status" => "OK",
            "data" => $row
        ]));
        exit;
    } else {
        echo(json_encode([
            "status" => "OK",
            "data" => "user tidak tersedia"
        ]));
        exit();
    }
}

function login()
{
    if (isset($_POST["email"]) && isset($_POST["password"])) {    
        global $koneksi;
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email = '$email' AND password = '$password'");
        if($user->num_rows){
            $row = mysqli_fetch_assoc($user);
            echo(json_encode([
                "status" => "OK",
                "data" => $row
            ]));
            exit;
        } else {
            echo(json_encode([
                "status" => "OK",
                "data" => "Email atau Password Salah!"
            ]));
            exit;
        }
    }else {
        echo(json_encode([
            "status" => "ERR",
            "data" => "Invalid request!"
        ]));
        exit;
    }
}

function update(){
    global $koneksi;

    if(
        !isset($_GET["id"]) ||
        !isset($_POST["username"]) ||
        !isset($_POST["email"]) ||
        !isset($_POST["alamat"])
    ){
        echo(json_encode([
            "status" => "ERR",
            "data" => "Error request!"
        ]));
        exit;
    }

    $id = trim($_GET["id"]);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $alamat = trim($_POST['alamat']);

    // get user
    $users_foto = [];

    $user = mysqli_query($koneksi, "SELECT foto FROM tb_users WHERE id_user = '$id'");
    if ($user->num_rows) {
        $users_foto = mysqli_fetch_assoc($user);
    }else {
        echo(json_encode([
            "status" => "ERR",
            "data" => "user tidak ditemukan!"
        ]));
        exit;
    }

    // cek foto
    // upload foto
    
    $nama_foto = $users_foto['foto'];
    if (isset($_FILES["foto-baru"])) {
        $foto_baru = $_FILES["foto-baru"];
            // // hapus file , jika default jangan dihapus
            if ($foto_baru != "user-default.png") {
                unlink("../assets/img/" . $nama_foto);
            }
            // upload file
            move_uploaded_file($foto_baru["tmp_name"], "../assets/img/" . $foto_baru["name"]);
        $nama_foto = $foto_baru["name"];
        }

        $sql = "UPDATE tb_users set username= '$username', email = '$email', alamat = '$alamat', foto = '$nama_foto' WHERE id_user ='$id'";
        $updated = mysqli_query($koneksi, $sql);
        echo(json_encode([
            "status" => "OK",
            "data" => $updated
        ]));
}