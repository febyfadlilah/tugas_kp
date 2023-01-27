<!DOCTYPE html>
<html lang="en">

<head>
    <title>Almaas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/LOGO.png">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Admin Almaas</title>
        <link href="img/icon.png" rel="icon">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="css/styleku.css" rel="stylesheet">
        <link href="css/util.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/jvectormap/jquery-jvectormap.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jquery-steps.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
</head>
<?php

include '../koneksi.php';
session_start();
if($_SESSION['role']!="2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$data = mysqli_fetch_assoc($hasil);
?>
<div class="header">
    <img class="img-fluid" src='../assets/img/atas.png'>
</div>
<div class="boxed">
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">Data Jamaah</h3></center>
                    </div>
                    <!--Data Table-->
                    <!--===================================================-->
                    <div class="panel-body">
                        <div class="table-responsive">
                        <center>
                            <img src="../foto/<?= $data['foto']?>" class="ukuran">
                        </center>
                        <br>
                        <table class="table table-success table-striped">
                            <tbody>
                                <tr>
                                    <th>No. Induk</th>
                                    <td><?php echo $data['no_induk']?></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?php echo $data['nama_lengkap']?></td>
                                </tr>    
                                <tr>
                                    <th>Nama Panggilan</th>
                                    <td><?php echo $data['nama_panggilan']?></td>
                                </tr>  
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><?php echo $data['tempat_lahir']?></td>
                                </tr>   
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?php echo $data['tanggal_lahir']?></td>
                                </tr> 
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?php echo $data['jenis_kelamin']?></td>
                                </tr> 
                                <tr>
                                    <th>Usia</th>
                                    <td><?php echo $data['usia']?></td>
                                </tr>   
                                <tr>
                                    <th>Alamat Rumah</th>
                                    <td><?php echo $data['alamat']?></td>
                                </tr>    
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td><?php echo $data['pendidikan']?></td>
                                </tr>  
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td><?php echo $data['pekerjaan']?></td>
                                </tr>   
                                <tr>
                                    <th>No. WhatsApp</th>
                                    <td><?php echo $data['no_whatsapp']?></td>
                                </tr>     
                                <?php
                                $sta = $data['id_status'];
                                $stat = mysqli_query($koneksi, "SELECT * FROM status where id_status='$sta'");
                                $status=mysqli_fetch_assoc($stat);
                                ?>
                                <tr>
                                    <th>
                                        Status 
                                    </th>
                                    <td><?php echo $status['nama_status']?></td>
                                </tr>
                                <?php
                                $kls = $data['id_kelas'];
                                $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                $kelas=mysqli_fetch_assoc($class);
                                ?>
                                <tr>
                                    <th>Kelas</th>
                                    <td><?php echo $kelas['nama_kelas'] ?></td>
                                </tr>        
                                <?php
                                $prg = $data['id_program'];
                                $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                $program=mysqli_fetch_assoc($pro);
                                ?>
                                <tr>
                                    <th>Program</th>
                                    <td><?php echo $program['nama_program'] ?></td>   
                                </tr>
                                                    
                            </tbody>
                        </table>
                        <center>
                            <img src="../kk/<?= $data['kk']?>" class="ukuran2">
                        </center>
                        <br>
                        <center>
                            <img src="../ktp/<?= $data['ktp']?>" class="ukuran2">
                        </center>
                    <!--===================================================-->
                    <!--End Data Table-->
                        </div>
                    </div>
                </div>
            </div>
        <!--End page content-->
    </div>
</div>
        <!--===================================================-->
        <!--End page content-->
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
<script>window.print()</script>   