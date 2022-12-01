<?php
require_once "../config/database.php";

header('Content-Type: application/json; charset=utf-8');

if(function_exists($_GET['method'])) {
    $_GET['method']();
 } 

function getAll(){
    global $koneksi;
    $users = mysqli_query($koneksi, "SELECT * FROM tb_fotomenu");
    
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
    $user = mysqli_query($koneksi, "SELECT * FROM tb_fotomenu WHERE id_fotomenu = '$id'");
    if($user->num_rows){
        $row = mysqli_fetch_assoc($user);
        echo(json_encode($row));
    };
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