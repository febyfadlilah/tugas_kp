<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:logout.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
$cek = mysqli_query($koneksi, "select * from kelas_jadwal where id_jamaah = '$id_jamaah' ");
$data = mysqli_fetch_assoc($cek);
$class = $data['id_jadwal'];
try {
    $post = mysqli_query($koneksi, "select * from post where id_pengajar = '$pengajar' AND id_kelas = '$class' ORDER BY id_post DESC");
  } catch (\Throwable $th) {
    echo "<SCRIPT>alert('Jadwal gagal di dapatkan');window.location='homepage_jamaah.php'</SCRIPT>";
    return;
  }
// $query="SELECT * FROM jadwal WHERE id_user = '$id_user' ";
// $hasil=mysqli_query($koneksi,$query);
require('./componen/header_user.php');
?>

<div class="container px-4 py-2">
    <?php
    foreach ($post as $p) {
        $row = $p['id_post'];
      $tgl = $p['tanggal'];
      $ket = $p['keterangan'];
      $bahan = $p['upload'];
    //   $keterangan_hadir = $jadwal['keterangan_hadir'];
      echo "
      <div class='card mb-2'>
        <div class='card-header  bg-success'>
          $tgl
        </div>
        <div class='card-body bg-light'>
          <h5 class='card-title'>$ket</h5>";
          if($bahan==''){
            echo "<p>$bahan</p>";
          } else {
            echo "<p class='card-text'>$bahan</p>
            <a href='show.php?id_post=$row'><p><button name='show'>Show</button></a>";
          }
        //   <p class='card-text'>$bahan</p>
        //   <p class='card-text'></p>
        echo "
        </div>
      </div>
      ";
    }
    ?>
  </div>
<?php
require('./componen/footer.php');
?>