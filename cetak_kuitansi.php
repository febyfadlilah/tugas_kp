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
</head>

<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
// $query="SELECT * FROM pembayaran WHERE id_jamaah = '$id_jamaah' ";
$query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
$hasil=mysqli_query($koneksi,$query);
$baris=mysqli_fetch_assoc($hasil);
try {
    $pembayarans = mysqli_query($koneksi, "select * FROM pembayaran WHERE id_jamaah = '$id_jamaah' ");
  } catch (\Throwable $th) {
    echo "<SCRIPT>alert('Pembayaran gagal di dapatkan');window.location='./index.php'</SCRIPT>";
    return;
  }
?>
    <!-- Start Banner Hero -->
    <!-- Container with border, extra paddings and margins -->
    <?php
    foreach ($pembayarans as $p) {
    //   $nama = $p['nama_pembayar'];
        $nama = $baris['nama_lengkap'];
      $nominal = $p['nominal'];
      $ket = $p['keterangan'];
      $tanggal = $p['tanggal'];
      echo "
      <div class='container bg-light py-3 my-3'>
      <div class='header'>
        <img class='img-fluid' src='assets/img/atas.png'>
      </div>
        <p class='text-center fs-1 fw-bold fst-italic'>Kwitansi</p>
        <table class='table table-hover'>
            <tbody>
                <tr>
                    <th>Sudah Terima Dari</th>
                    <td>$nama</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>$nominal</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>$ket</td>
                </tr>
                <tr>
                    <th>Terbayar pada </th>
                    <td>$tanggal</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Terbilang : Rp.</th>
                    <td>$nominal</td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
    ";
    }
    ?>
    <script>window.print()</script>