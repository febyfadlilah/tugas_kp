<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login_jamaah.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
$cek = mysqli_query($koneksi, "select * from kelas_jadwal as k inner join jadwal as j on k.id_jadwal = j.id_jadwal where k.id_jamaah ='$id_jamaah' order by k.id_kelasjadwal desc");
require('./componen/header_user.php');
?>
<?php
while ($baris=mysqli_fetch_assoc($cek)) {
?>
<a href="show_post.php?id_jadwal=<?=$baris['id_jadwal']?>">
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
                                                <h6></h6>
                                                <p style="text-decoration: underline;"><?php echo $baris['jam']?></p>
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
require('./componen/footer_user.php');
?>