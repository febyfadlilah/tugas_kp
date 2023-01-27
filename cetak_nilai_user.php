<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:logout.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
try {
    $nilai = mysqli_query($koneksi, "select * from nilai where id_jamaah = '$id_jamaah' ");
  } catch (\Throwable $th) {
    echo "<SCRIPT>alert('Presensi gagal di dapatkan');window.location='./index.php'</SCRIPT>";
    return;
  }
?>
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
</head>

<div class="header">
    <img class="img-fluid" src="assets/img/atas.png">
</div>
<div class="container px-4 py-2">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </ul>
            </div>
        </div>
    </nav>

    <!-- isi -->
    <?php
    $query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
    $hasil=mysqli_query($koneksi,$query);
    ?>
    <table>
            <?php //mengolah hasil query
            while ($baris=mysqli_fetch_assoc($hasil)) {
            ?>
        <tr>
            <td><b>Nama</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['nama_lengkap']?></td>
        </tr>
        <tr>
            <td><b>Tempat, Tanggal Lahir</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['tempat_lahir'].", ".$baris['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <td><b>Alamat</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['alamat']?></td>
        </tr>
        <br>
        <?php }?>
    </table>
    <table class='table table-success table-striped text-center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th style='padding:0px;''>Aspek Penilaian</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                </tr> 
            </thead>
        <?php
            $no = 0;
            foreach ($nilai as $p) {
            $aspek = $p['aspek_penilaian'];
            $pel = $p['kkm'];
            $nilai = $p['nilai_total'];
            $no++;
            echo "
            <tbody>
                <tr>
                <td>$no</td>
                    <td>$aspek</td>
                    <td>$pel</td>
                    <td>$nilai</td>
                </tr>
            ";
            } 
            ?>        
        </tbody>      
        </tbody>
    </table>
</div>
<script>window.print()</script>