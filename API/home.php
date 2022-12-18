<?php

include ("../Config/koneksi.php");



// header('Content-Type: application/json; charset=utf-8');

// if (function_exists($_GET['method'])) {
//     # code...
//     $_GET['method']();
// }
// function getWarung()
// {
//     # code...
//     global $koneksi;
//     $query ="SELECT tb_warung.nama_warung, tb_warung.alamat, tb_rating.rating, tb_warung.foto FROM tb_warung JOIN tb_rating ON tb_warung.id_warung = tb_rating.id_warung";
//     $result =mysql_query($koneksi, $query);

//     $daftar =array();

//     if (mysqli_num_rows($result)>0) {
//         # code...
//         while ($row =mysqli_fetch_assoc($result)) {
//             # code...
//             array_push($daftar,$row);
//         }
//     }
//     return $daftar;
//     echo json_encode($daftar);
// }
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

?>