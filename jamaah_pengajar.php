<?php
include 'koneksi.php';
session_start();
if($_SESSION['id_pengajar']==""){
    header("location:login_pengajar.php");
}
$id_pengajar = $_SESSION['id_pengajar'];
$kelas = mysqli_query($koneksi, "select * from jadwal where id_pengajar ='$id_pengajar' ");
require('./componen/header_pengajar.php');
?>
<?php
while ($baris=mysqli_fetch_assoc($kelas)) {
?>
<a href="forum.php?id_jadwal=<?=$baris['id_jadwal']?>">
<div class="container px-4 py-2" style="text-decoration: none;">
    <section class="section dashboard">
        <div class="row">
                <!-- kanan -->
                <div class="card">
                    <div class="navbarbaru card-body">
                        <h5 class="card-title text-white" style="text-decoration: underline;"><?php echo $baris['nama_kelas']?> <span>| <?php echo $baris['hari']?></span></h5>
                        <div class="activity">
                            <div class="activity-item d-flex">
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <table class="text-white">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <h6 style="text-decoration: underline;"><?php echo $baris['jam']?></h6>
                                                <?php 
                                                $kode_kelas = $baris['id_jadwal'];
                                                $cek =  mysqli_query($koneksi, "select * from kelas_jadwal where id_jadwal ='$kode_kelas' ");
                                                $jumlah = mysqli_num_rows($cek);
                                                ?>
                                                <br>
                                                <p style="text-decoration: underline;"><?php echo $jumlah ?> Jamaah</p>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div><!-- End Right side columns -->
        </div>
    </section>
</div>
<?php } ?>
</a>

<?php
require('./componen/footer_pengajar.php');
?>