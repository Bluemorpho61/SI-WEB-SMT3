<?php
session_start();
include('../Config/koneksi.php');

if (!isset($_SESSION['id_user'])) {
    $_SESSION['msg'] = 'Anda harus login terlebih dahulu';
    header("Location:../View/Masuk.php");
}

if (!isset($_GET['id'])){
    header("Location:../View/KelolaWarung.php");
}

$getID=$_GET['id'];
print_r($getID);


$sql ="SELECT * FROM tb_warung WHERE id_warung=$getID";
$result = mysqli_query($koneksi, $sql);
$row =mysqli_fetch_assoc($result);

?><script>

</script><?php
if (isset($_POST['submit'])) {

    $nama_warung =$_POST['nama_warung'];
    $alamat=$_POST['alamat'];
    $deskripsi=$_POST['deskripsi'];
    $filename =$_FILES['foto']['name'];
    $temp_name =$_FILES['foto']['tmp_name'];
    $folder ="../Assets/img/".$filename;


    $query ="UPDATE tb_warung SET nama_warung='$nama_warung', alamat='$alamat',deskripsi='$deskripsi',foto='$filename' WHERE id_warung=$getID";

    mysqli_query($koneksi, $query);
    header('Location:../View/tables.php');
    move_uploaded_file($temp_name,$folder);
    header("Location:../View/KelolaWarung.php");
//    $query = "INSERT into tb_warung (id_warung, nama_warung, alamat, foto, id_user, tanggal_ditambahkan) VALUES
//            ('','$namaWarung','$alamatWarung','$fotoData','$sesID',now()";
//
//    mysqli_query($koneksi, $query);
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <title>WarungKuy Admin </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>Edit Info Warung</h1></div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image"
                                                                       class="img-circle img-responsive"
                                                                       src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a>
        </div>
    </div>

    <form class="form" action="" enctype="multipart/form-data" method="post"
          id="registrationForm">

        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <script type="text/javascript">
                        function readUrl(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#coy').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0])
                            }
                        }
                    </script>
                    <img src="../Assets/img/<?php echo $row['foto']; ?>" class="avatar img-circle img-thumbnail"
                         id="coy" alt="avatar">
                    <h6>Silahkan pilih foto profil utama warung</h6>


                    <input type="file" name="foto" value="<?php $row['foto'] ?>" class="text-center center-block file-upload"
                           onchange="readUrl(this)">

                </div>
                <br>


            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>

                        <div class="form">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Nama Warung</h4></label>
                                <input type="text" class="form-control" name="nama_warung" id="first_name" value="<?php echo $row['nama_warung'];?>"
                                       title="enter your first name if any.">

                            </div>
                        </div>
                        <div class="form">

                            <div class="col-xs-6">
                                <label for="last_name"><h4>Alamat</h4></label>
                                <input type="text" class="form-control" name="alamat" id="last_name" value="<?php echo $row['alamat'];?>"
                                    title="enter your last name if any.">

                            </div>
                        </div>

                        <div class="form">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Deskripsi</h4></label>
                                <input type="text" class="form-control" id="phone"  value="<?php echo $row['deskripsi']; ?>" name="deskripsi"></input>

                            </div>
                        </div>


                        <div class="form">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>

                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset
                                </button>
                            </div>
                        </div>


                        <hr>

                    </div><!--/tab-pane-->


                </div><!--/tab-pane-->
            </div><!--/tab-content-->
    </form>
</div><!--/col-9-->
</div><!--/row-->
