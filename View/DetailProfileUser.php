<?php
session_start();
require('../Config/koneksi.php');
if (!isset($_SESSION['id_user'])){
    $_SESSION['msg']='Anda harus login terlebih dahulu';
    header("Location:../View/Masuk.php");
}
$sesNama =$_SESSION['username'];
$id_user = $_GET['id'];

$query ="SELECT * FROM tb_users WHERE id_user=$id_user";
$result =mysqli_query($koneksi, $query);
$row =mysqli_fetch_assoc($result);
$nama =$row['username'];
$alamat=$row['alamat'];
$hak =$row['hak'];
$email =$row['email'];

?>

<link href="css/startmin.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!------ Include the above in your HEAD tag ---------->


<body style="margin-top: 80px;">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="../../index.php">WarungKuy Administrator</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $sesNama; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="../Controller/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>

                </li>
                <li>
                    <a href="tables.php" class="active"><i class="fa fa-table fa-fw"></i> Kelola User</a>
                </li>
                <li>
                    <a href="KelolaWarung.php"><i class="fa fa-edit fa-fw"></i>Kelola Data Warung</a>
                </li>
            </ul>
        </div>
    </div>

</nav>


<div class="container">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php
                   echo $nama;
                    ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    ?>
                    <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                        src="../Assets/img/<?php echo $row['foto'];?>"
                                                                        class="img-circle img-responsive"></div>

                    <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                      <dl>
                        <dt>DEPARTMENT:</dt>
                        <dd>Administrator</dd>
                        <dt>HIRE DATE</dt>
                        <dd>11/12/2013</dd>
                        <dt>DATE OF BIRTH</dt>
                           <dd>11/12/2013</dd>
                        <dt>GENDER</dt>
                        <dd>Male</dd>
                      </dl>
                    </div>-->
                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Tipe User:</td>
                                <td><?php  echo $hak;?></td>
                            </tr>
                            <tr>

                            <tr>
                                <td>Email</td>
                                <td><?php
                                    echo $email;
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php
                                    echo $alamat;
                                    ?></td>
                            </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="AturProfileUser.php?id=<?php echo $id_user;?>" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                   class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit">Edit </i></a>
            </div>

        </div>
    </div>
</div>
</div>

<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>