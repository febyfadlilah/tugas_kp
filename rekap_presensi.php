<?php
include 'koneksi.php';
session_start();
if($_SESSION['id_pengajar']==""){
    header("location:login_pengajar.php");
}
$id_pengajar = $_SESSION['id_pengajar'];
$id = $_GET['id_jadwal'];
$hasil = mysqli_query($koneksi, "SELECT * FROM presensi where tanggal= CURDATE() and id_jadwal='$id'");
$hadir = mysqli_query($koneksi, "SELECT * FROM presensi where tanggal= CURDATE() and id_jadwal='$id' and status_kehadiran = 'Hadir'");
$jumlah = mysqli_num_rows($hadir);
$sakit = mysqli_query($koneksi, "SELECT * FROM presensi where tanggal= CURDATE() and id_jadwal='$id' and status_kehadiran = 'Sakit'");
$jumlah_sakit = mysqli_num_rows($sakit);
$izin = mysqli_query($koneksi, "SELECT * FROM presensi where tanggal= CURDATE() and id_jadwal='$id' and status_kehadiran = 'Izin'");
$jumlah_izin = mysqli_num_rows($izin);
$pres = mysqli_query($koneksi, "SELECT * FROM presensi where tanggal= CURDATE() and id_jadwal='$id' and status_kehadiran = 'Mengikuti'");
$presensi = mysqli_num_rows($pres);
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
    <!-- kotak -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-body">
                    <h3 class="text-center mb-0">Hadir</h3>
                    <p class="text-center mb-0"><?php echo $jumlah?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-body">
                    <h3 class="text-center mb-0">Izin</h3>
                    <p class="text-center mb-0"><?php echo $jumlah_izin?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
                <div class="card-body">
                    <h3 class="text-center mb-0">Sakit</h3>
                    <p class="text-center mb-0"><?php echo $jumlah_sakit?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </ul>
                <div class="row">
                    <div class="text-left">
                        <a class="btn btn-success" href="form_presensi_pengajar.php?id_jadwal=<?=$id?>">Presensi</a>
                    </div>
                </div>
                </ul>
            </div>
        </div>
    </nav>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Keterangan</th>
            </tr> 
        </thead>
        <tbody>
            <?php
                while ($baris=mysqli_fetch_assoc($hasil)) {
                ?>
                <tr>
                <?php
                    $usr = $baris['id_jamaah'];
                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$usr'");
                    $user=mysqli_fetch_assoc($usrr);
                    // $id_peng = $user['id_pengajar'];

                    ?>
                    <td><?php echo $user['nama_lengkap'] ?></td>
                    <td><?php echo $baris['tanggal']?></td>
                    <td><?php echo $baris['waktu']?></td>
                    <td><?php echo $baris['status_kehadiran']?></td>
                    <?php } ?>
                </tr>
            </tbody>
    </table>
</div>

<?php
require('./componen/footer_pengajar.php');
?>