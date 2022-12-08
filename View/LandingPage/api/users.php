<?php
require_once "../config/database.php";

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

function add(){
    echo(json_encode(["method" => $_GET["method"]]));
}

function update(){
    echo(json_encode(["method" => $_GET["method"]]));
}


function delete(){
    echo(json_encode(["method" => $_GET["method"]]));
}