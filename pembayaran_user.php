<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
// $query="SELECT * FROM pembayaran WHERE id_user = '$id_user' ";
$query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
$hasil=mysqli_query($koneksi,$query);
$baris=mysqli_fetch_assoc($hasil);
try {
    $pembayarans = mysqli_query($koneksi, "select * FROM pembayaran WHERE id_jamaah = '$id_jamaah' ");
  } catch (\Throwable $th) {
    echo "<SCRIPT>alert('Pembayaran gagal di dapatkan');window.location='./index.php'</SCRIPT>";
    return;
  }
require('./componen/header_user.php');
?>
    <!-- Start Banner Hero -->
    <!-- Container with border, extra paddings and margins -->
    <?php
    foreach ($pembayarans as $p) {
    //   $nama = $p['nama_pembayar'];
        $nama = $baris['nama_lengkap'];
      $jumlah = $p['nominal'];
      $ket = $p['keterangan'];
      $tanggal = $p['tanggal'];
      echo "
      <div class='container bg-light py-3 my-3'>
        <div class='header'>
            <img src='./assets/img/tulisan almaas - Copy.png'>
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
                    <td>$jumlah</td>
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
                    <td>$jumlah</td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
    ";
    }
    ?>
    <center><a href='cetak_kuitansi.php' target='_BLANK'><button class='text-center btn btn-success'>Cetak</button></a></center>
    <br>
    <!-- End Banner Hero -->
<?php
require('./componen/footer_user.php');
?>