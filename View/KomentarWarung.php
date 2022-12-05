<?php
session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location:../View/masuk.php");
}

if (!isset($_GET['id'])){
    header("Location:../View/KelolaWarung.php");
}

include('../Config/koneksi.php');
$id_warung = $_GET['id'];

//Query SELECT ALL
$query = "SELECT * FROM tb_warung WHERE id_warung=$id_warung";
//Query SELECT Username Kontributor info warung
$result =mysqli_query($koneksi,$query);
$row = mysqli_fetch_assoc($result);




?>
<link href="../View/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../View/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="../View/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../View/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <title>Lihat Komentar - <?php echo $row['nama_warung']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../View/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <script src="../View/js/bootstrap.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1><?php echo $row['nama_warung']; ?></h1>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <?php
            $query_getFoto = "SELECT foto FROM tb_warung WHERE id_warung=$id_warung";
            $hasil_queryFoto = mysqli_query($koneksi, $query_getFoto);
            $rowGambar = mysqli_fetch_assoc($hasil_queryFoto);

            ?>

            <div class="text-center">
                <img src="../Assets/img/<?php echo $rowGambar['foto']; ?>" class="avatar img-circle img-thumbnail"
                     alt="avatar">
            </div>
            </hr><br>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"> <span class="pull-left"><strong><a href="../View/KomentarWarung.php?id=<?php echo $id_warung;?>">Komentar</a></strong></span>
                    125
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong><a href="EditInfoWarung.php">Favorit</a></strong></span>
                    13
                </li>
                <li class="list-group-item text-right"><span
                            class="pull-left"><strong><a
                                    href="EditInfoWarung.php">Banyak Rating Yang Diberikan</a></strong></span> 78
                </li>
            </ul>


        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Lihat Komentar - <?php echo $row['nama_warung']?></a></li>


            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">

                    <div class="panel-body">
                        <div class="table-responsive h-50" style="max-height: 500px">
                            <div id="dataTable_Wrapper" class="dataTables_wrapper form-inline">
                                <div class="row">
                                    <div id="dataTable_length" class="dataTables_length">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTables"
                                                       class="table table-striped table-bordered table-hover"
                                                       role="grid">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>Nama User</th>
                                                        <th>Komentar</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $queryGetFotoWarung = "SELECT * FROM tb_fotowarung WHERE id_warung=$id_warung";
                                                    $resultFotoWarung = mysqli_query($koneksi, $queryGetFotoWarung);
                                                    while ($data = mysqli_fetch_array($resultFotoWarung, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data['id_fotowarung']; ?></td>
                                                            <td>
                                                                <img style="width: 410px; height: 200px;"
                                                                     src="../Assets/img/<?php echo $data['foto_warung']; ?>">
                                                                <a href="../Controller/delete_fotowarung.php?foto=<?php echo $data['id_fotowarung'];?>"><button class="btn btn-danger" name="hapus_gambar_warung">Hapus Gambar</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/tab-pane-->
        </div>
    </div><!--/col-9-->
</div><!--/row-->




