<?php
require_once "../Config/koneksi.php";

header('Content-Type: application/json; charset=utf-8');

if(function_exists($_GET['method'])) {
    $_GET['method']();
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
    echo(json_encode($users_data));
}

function getById(){
    global $koneksi;
    $id = $_GET["id"];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE id_user = '$id'");
    if($user->num_rows){
        $row = mysqli_fetch_assoc($user);
        echo(json_encode($row));
    };
}
function getByEmail(){
    global $koneksi;
    $email = $_GET["email"];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email = '$email'");
    if($user->num_rows){
        $row = mysqli_fetch_assoc($user);
        echo(json_encode($row));
    } else {
        echo(json_encode([
            "message" => "Email atau Password Salah!"
        ]));
    }
}

function login()
{
    if (isset($_POST)) {    
        global $koneksi;
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE email = '$email' AND password = '$password'");
        if($user->num_rows){
            $row = mysqli_fetch_assoc($user);
            echo(json_encode($row));


        } else {
            echo(json_encode([
                "status" => "ERR",
                "message" => "Email atau Password Salah!"
            ]));
        }
    }else {
        echo(json_encode([
            "status" => "ERR",
            "message" => "Error request!"
        ]));
    }
}


function update()
{
    global $koneksi;

    if (
        !isset($_GET["id"]) ||
        !isset($_POST["username"]) ||
        !isset($_POST["email"]) ||
        !isset($_POST["alamat"])
    ) {
        echo (json_encode([
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
    } else {
        echo (json_encode([
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
        // if ($foto_baru != "user-default.png") {
        //     unlink("../assets/img/" . $nama_foto);
        // }
        // upload file
        move_uploaded_file($foto_baru["tmp_name"], "../assets/img/" . $foto_baru["name"]);
        $nama_foto = $foto_baru["name"];
    }

    $sql = "UPDATE tb_users set username= '$username', email = '$email', alamat = '$alamat', foto = '$nama_foto' WHERE id_user ='$id'";
    $updated = mysqli_query($koneksi, $sql);
    echo (json_encode([
        "status" => "OK",
        "data" => $updated
    ]));
}


function add(){
    echo(json_encode(["method" => $_GET["method"]]));
}

// function update(){
//     echo(json_encode(["method" => $_GET["method"]]));
// }


function delete(){
    echo(json_encode(["method" => $_GET["method"]]));
}