<?php
include 'koneksi.php';
session_start();
if($_SESSION['id_pengajar']==""){
    header("location:login_pengajar.php");
}
$id_pengajar = $_SESSION['id_pengajar'];
$id = $_GET['id_jadwal'];
try {
    $post = mysqli_query($koneksi, "select * from post where id_jadwal = $id ORDER BY id_post DESC");
} catch (\Throwable $th) {
echo "<SCRIPT>alert('Post gagal di dapatkan');window.location='homepage_pengajar.php'</SCRIPT>";
return;
}
$kelas = mysqli_query($koneksi, "select * from post where id_jadwal = $id ORDER BY id_post DESC");
require('./componen/header_pengajar.php');
?>

<div class="container px-4 py-2">
<!-- navbar-->
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li><a class="btn" href="forum.php?id_jadwal=<?=$id?>"><img src="assets/img/list.png" title="Daftar Postingan"></a></li>
                        <li><a class="btn" href="post_classroom.php?id_jadwal=<?=$id?>"><img src="assets/img/share.png" title="Tambah Postingan"></a></li>
                    </ul>
                <form class="d-flex">
                    <div class="text-left">
                        <a class="btn" href="rekap_presensi.php?id_jadwal=<?=$id?>"><img src="assets/img/pen_3.png" title="Presensi"></a>
                        <a class="btn" href="detail_jamaah.php?id_jadwal=<?=$id?>"><img src="assets/img/users.png" title="Jamaah"></a>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>
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
require('./componen/footer_pengajar.php');
?>