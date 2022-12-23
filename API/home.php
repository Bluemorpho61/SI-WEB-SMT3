<?php

include ("../Config/koneksi.php");

//israel bab

header('Content-Type: application/json; charset=utf-8');

if (function_exists($_GET['method'])) {
    $_GET['method']();
}

function getWarung()
{
    global $koneksi;
    $warung = mysqli_query($koneksi, "SELECT tb_warung.nama_warung, tb_warung.alamat, tb_rating.rating, tb_warung.foto FROM tb_warung JOIN tb_rating ON tb_warung.id_warung = tb_rating.id_warung");

    $list =array();
    while ($row =mysqli_fetch_assoc($warung)) {
        # code...
        $list[] =$row;

    }

    echo(json_encode($list));

}

function ToDetailInfo()
{
   

    $list =array();
    while($row =mysqli_fetch_assoc($query)){
        $list[] =$row;
    }
    echo(json_encode($list));
}


?>