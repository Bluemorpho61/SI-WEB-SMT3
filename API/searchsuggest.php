<?php

include("../Config/koneksi.php");

header('Content-Type: application/json; charset=utf-8');

if (function_exists($_GET['method'])) {
    $_GET['method']();
}

function getSearchData()
{
    # code...
    global $koneksi;
    $res = mysqli_query($koneksi, "SELECT tb_warung.id_warung,tb_warung.nama_warung,
     tb_warung.alamat, AVG((tb_rating.rating)) AS jumlah, tb_warung.foto
    FROM tb_warung
    LEFT JOIN tb_rating
    ON tb_warung.id_warung = tb_rating.id_rating
    GROUP BY tb_warung.nama_warung");
    $list = array();
    while ($row =mysqli_fetch_assoc($res)) {
        # code...
        $list[] = $row;
    }
    echo (json_encode($list));

}




?>