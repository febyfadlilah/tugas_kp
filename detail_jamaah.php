

<?php
include 'koneksi.php';
session_start();
if($_SESSION['id_pengajar']==""){
    header("location:login_pengajar.php");
}
$id = $_GET['id_jadwal'];
$id_pengajar = $_SESSION['id_pengajar'];
$kelas =mysqli_query($koneksi, "select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah where k.id_jadwal=$id");  
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
    <table class="table table-success table-striped text-center">
            <thead>
                <tr>
                    <th style="padding:0px;">No.</th>
                    <th>Nama Jamaah</th>
                    <!-- <th>Kelas</th> -->
                </tr> 
            </thead>
            <?php //mengolah hasil query
            $no = 0;
            while ($baris=mysqli_fetch_assoc($kelas)) {
                $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $baris['nama_lengkap']?></td>
            </tr>
            <?php } ?>       
            </tbody>
        </table>
    </div>
<?php
require('./componen/footer_pengajar.php');
?>