<?php
require_once "../config/database.php";

header('Content-Type: application/json; charset=utf-8');

if(function_exists($_GET['method'])) {
    $_GET['method']();
 } 

function getAll(){
    global $koneksi;
    $warung = mysqli_query($koneksi, "SELECT * FROM tb_warung");
    
    $warung_data = [];

    if($warung->num_rows){
        while(($row = $warung->fetch_assoc())) {
            $warung_data[] = $row;
          }
    };
    echo(json_encode([
        "status" => "OK",
        "data" => $warung_data
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
    $warung = mysqli_query($koneksi, "SELECT * FROM tb_warung WHERE id_warung = '$id'");
    if($warung->num_rows){
        $row = mysqli_fetch_assoc($warung);
        echo(json_encode([
            "status" => "OK",
            "data" => $row
        ]));
        exit;
    }else {
        echo(json_encode([
            "status" => "OK",
            "data" => "warung tidak tersedia"
        ]));
        exit;
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