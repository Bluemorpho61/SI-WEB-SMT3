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
    //$warung = mysqli_query($koneksi, "SELECT tb_warung.nama_warung, tb_warung.alamat, tb_rating.rating, tb_warung.foto FROM tb_warung JOIN tb_rating ON tb_warung.id_warung = tb_rating.id_warung");
    $warung =mysqli_query($koneksi,"SELECT tb_warung.id_warung,tb_warung.nama_warung, tb_warung.alamat, AVG(tb_rating.rating) AS rating, tb_warung.foto 
    FROM tb_warung 
    JOIN tb_rating 
    ON tb_warung.id_warung = tb_rating.id_warung
    GROUP BY tb_warung.nama_warung");

    $list =array();
    while ($row =mysqli_fetch_assoc($warung)) {
        # code...
        $list[] =$row;

    }

    echo(json_encode($list));

}


function getRating()
{
    # code...
    if (isset($_POST)) {

        # code...
        //create an api that require a variable
         global $koneksi;
        $id_warung = $_POST["id"];
        $query = mysqli_query($koneksi, 
        "SELECT tb_users.id_user, tb_users.username , tb_warung.nama_warung,tb_warung.alamat ,tb_rating.rating,tb_warung.foto
        FROM tb_users
        LEFT JOIN tb_rating
        ON tb_users.id_user = tb_rating.id_user AND tb_users.id_user =$id_warung
        JOIN tb_warung
        ON tb_rating.id_warung = tb_warung.id_warung
        GROUP BY tb_rating.rating ");
        //fetch data
        $list =array();
        while($row =mysqli_fetch_assoc($query)){
            $list[] =$row;
        }
        echo(json_encode($list));

        
    }
}


function getUserProf()
{
    # code...
    if (isset($_POST)) {
        # code...
        global $koneksi;
        $id_user=$_POST['id_user'];
        $query =mysqli_query($koneksi, "SELECT * FROM `tb_users` WHERE tb_users.id_user=$id_user");
        $list =array();
        while ($row =mysqli_fetch_assoc($query)) {
            # code...
            $list[]=$row;
        }
        echo(json_encode($list));
    }
}



function getFav()
{
    //todo:create an api to catch fav user data
    # code...
    if (isset($_POST)) {
        # code...
        global $koneksi;
        $id_warung=$_POST['id_user'];
        $query = mysqli_query($koneksi, "SELECT tb_favorit.id_favorit,tb_users.id_user, tb_users.username, tb_warung.nama_warung, tb_rating.rating, tb_warung.foto
        FROM tb_users
        LEFT JOIN tb_favorit
        ON tb_users.id_user = tb_favorit.id_user
        JOIN tb_warung
        ON tb_warung.id_warung = tb_favorit.id_warung
        LEFT JOIN tb_rating
        ON tb_users.id_user = tb_rating.id_user 
        GROUP BY tb_users.username AND tb_users.id_user =$id_warung");

         $list =array();
         while($row =mysqli_fetch_assoc($query)){
             $list[] =$row;
         }
         echo(json_encode($list));
    }
}
?>
