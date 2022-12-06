<?php
session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location:../View/masuk.php");
}


include('../Config/koneksi.php');
$id_warung = $_GET['fav'];

//Query SELECT ALL
$query = "SELECT * FROM tb_warung WHERE id_warung=$id_warung";
//Query SELECT Username Kontributor info warung
$query_getNama = "SELECT tb_warung.id_warung, tb_users.username FROM tb_warung, tb_users WHERE tb_warung.id_user = tb_users.id_user AND tb_warung.id_warung =$id_warung";
$resultNama = mysqli_query($koneksi, $query_getNama);
$rowNama = mysqli_fetch_assoc($resultNama);

$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

//Data yang telah di fetch
$nama_warung = $row['nama_warung'];
$alamat_warung = $row['alamat'];
$tgl_ditambahkan = $row['tanggal_ditambahkan'];
$gambar = $row['foto'];
$kontributor = $rowNama['username'];
$deskripsi = $row['deskripsi'];


//Count jumlah komentar
$qry_htg_komentar = "SELECT COUNT(tb_log_comment_user.komentar) AS jumlah FROM tb_log_comment_user WHERE tb_log_comment_user.id_warung= $id_warung";
$resultCountCmnt = mysqli_query($koneksi, $qry_htg_komentar);
$hslCountCmnt = $resultCountCmnt->fetch_assoc()['jumlah'];

if (isset($_POST['simpan_fotoWarung'])) {
    $nama_foto = $_FILES['foto']['name'];
    $temp_name = $_FILES['foto']['tmp_name'];
    $folder = "../Assets/img/" . $nama_foto;
    $query = "INSERT INTO tb_fotowarung VALUES (NULL,'$nama_foto',$id_warung)";
    mysqli_query($koneksi, $query);
    if (move_uploaded_file($temp_name, $folder)) {
        ?>
        <script>
            alert("Tambah foto warung berhasil!")
        </script><?php
        header("Location:../View/EditInfoWarung.php?id=$id_warung");
    } else {
        ?>
        <script>
            alert("Tambah foto warung gagal");
        </script><?php
    }
}


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
    <title>Detail Info Warung</title>
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
        <div class="col-sm-10"><h1><?php echo $nama_warung; ?></h1>
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
                <li class="list-group-item text-right"><span class="pull-left"><strong><a
                                    href="../View/KomentarWarung.php?id=<?php echo $id_warung; ?>">Komentar</a></strong></span>
                    <?php echo $hslCountCmnt; ?>
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong><a
                                    href="../View/WarungFavorit.php">Favorit</a></strong></span>
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
                <li class="active"><a data-toggle="tab" href="#home">Detail Info</a></li>


            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>

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
                                                        <th>ID Favorit</th>
                                                        <th>Pengguna yang menyukai ini</th>
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
                                                                <a href="../Controller/delete_fotowarung.php?foto=<?php echo $data['id_fotowarung']; ?>&id=<?php echo $id_warung ?>">
                                                                    <button class="btn btn-danger"
                                                                            name="hapus_gambar_warung">Hapus Gambar
                                                                    </button>
                                                                </a>
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




