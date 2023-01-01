<?php
require ("../Config/koneksi.php");
header('Content-Type: application/json; charset=utf-8');

if(function_exists($_GET['method'])) {
    $_GET['method']();
 } 


 //Perlu Disempurnakan
function getDetail()
{
    # code...
    if (isset($_POST)) {    
        global $koneksi;
        $id_warung = $_POST["id"];
        $query = mysqli_query($koneksi, 
        "SELECT tb_warung.id_warung,tb_warung.nama_warung ,COUNT(tb_rating.rating) AS JUMLAH
        FROM tb_warung
        LEFT OUTER JOIN tb_rating
        ON tb_warung.id_warung = tb_rating.id_warung AND tb_warung.id_warung=$id_warung
        ");
        if(mysqli_num_rows($query)){
            $row = mysqli_fetch_assoc($query);
            echo(json_encode($row));

        } else {
            echo(json_encode([
                "status" => "ERR",
                "message" => "Gagal"
            ]));
        }
    }else {
        echo(json_encode([
            "status" => "ERR",
            "message" => "Error request!"
        ]));
    }
}
    

