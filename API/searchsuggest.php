<?php 
 


//include database connection
include_once '../Config/koneksi.php';

//header content type
header('Content-Type: application/json; charset=utf-8');

//global variable
global $koneksi;

//check if method exists
if (function_exists($_GET['method'])) {
    # code...
    $_GET['method']();
}

//function for match percentage
function matchPer($s1, $s2)
{
    # code...
    similar_text(strtolower($s1), strtolower($s2), $per);
    return $per;
}

//check if q exists
if (isset($_REQUEST['q'])) {
    # code...
    $query=strtolower($_REQUEST['q']);
}else {
    $query="";
}

//create array for json
$json['error']=false;
$json['errmsg']="";
$json['data']=array();

//query for search suggestion
$sql ="SELECT tb_warung.id_warung, tb_warung.nama_warung, tb_warung.alamat FROM tb_warung ORDER BY tb_warung.nama_warung ASC";
$res =mysqli_query($koneksi,$sql);
$num_rows=mysqli_num_rows($res);

//check if num_rows > 0

if ($num_rows>0) {
    # code...
    $nama_warung=array();
    while ($obj = mysqli_fetch_object($res)) {
        # code...
        $matching =matchPer($query, $obj->nama_warung);
        $nama_warung[$matching][$obj->id_warung]=$obj->nama_warung;
    }

    krsort($nama_warung);

    foreach ($nama_warung as $innerArray) {
        # code...
        foreach ($innerArray as $id_warung => $nama_warung) {
            # code...
            $subdata = array();
            $subdata['id_warung']=$id_warung;
            $subdata['nama_warung']=$nama_warung;
            array_push($json['data'], $subdata);
        }
    }

    mysqli_close($koneksi);
    header('content-type: application/json; charset=utf-8');
    echo json_encode($json);
}else {
    mysqli_close($koneksi);
    header('content-type: application/json; charset=utf-8');
    echo json_encode($json);
}

?>





// require_once "../Config/koneksi.php";

// header('Content-Type: application/json; charset=utf-8');

// global $koneksi;

// if (function_exists($_GET['method'])) {
//     # code...
//     $_GET['method']();
// }

// function matchPer($s1, $s2)
// {
//     # code...
//     similar_text(strtolower($s1), strtolower($s2), $per);
//     return $per;
// }



// if (isset($_REQUEST['q'])) {
//     # code...
//     $query=strtolower($_REQUEST['q']);
// }else {
//     $query="";
// }

// $json['error']=false;
// $json['errmsg']="";
// $json['data']=array();

// $sql ="SELECT tb_warung.id_warung, tb_warung.nama_warung, tb_warung.alamat FROM tb_warung ORDER BY tb_warung.nama_warung ASC";
// $res =mysql_query($koneksi,$sql);
// $num_rows=mysql_num_rows($res);

// if (num_rows>0) {
//     # code...
//     $nama_warung=array();
//     while ($obj = mysql_fetch_object($res)) {
//         # code...
//         $matching =matchPer($koneksi, $obj->nama_warung);
//         $nama_warung[$matching][$obj->id_warung]=$obj->nama_warung;
//     }

//     krsort($nama_warung);

//     foreach ($nama_warung as $innerArray) {
//         # code...
//         foreach ($innerArray as $id_warung => $nama_warung) {
//             # code...
//             $subdata = array();
//             $subdata['id_warung']=$id_warung;
//             $subdata['nama_warung']=$nama_warung;
//             array_push($json['data'], $subdata);
//         }
//     }
    
// }else {
//     mysqliclose($koneksi);
//     header('content-type: application/json; charset=utf-8');
//     echo json_encode($json);
// }
?>