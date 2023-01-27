<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:logout.php");
}
$tanggal = date('d-m-Y');
// $bsk = date('d/m/Y', strtotime(''));
$besok = date('D', strtotime('tomorrow'));
$hariini = date('D', strtotime($tanggal));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
$hari = $dayList[$hariini];
$tomorrow =  $dayList[$besok];
$id_jamaah = $_SESSION['id_jamaah'];
$cek = mysqli_query($koneksi, "select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah inner join jadwal as jad on k.id_jadwal = jad.id_jadwal where j.id_jamaah= $id_jamaah and jad.hari = '$hari'");
$cekbesok = mysqli_query($koneksi, "select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah inner join jadwal as jad on k.id_jadwal = jad.id_jadwal where j.id_jamaah= $id_jamaah and jad.hari = '$tomorrow'");
require('./componen/header_user.php');
?>

<div class="container px-4 py-2">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- kiri -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Jadwal Mengaji</h5>
                                <table class="table table-success table-striped">
                                    <tbody>
                                    <?php
                                    while ($baris=mysqli_fetch_assoc($cek)) {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="form_presensi_user.php?id_jadwal=<?=$baris['id_jadwal']?>"><h6><?php echo $baris['nama_kelas'] ?></h6></a>
                                                <p><?php echo $baris['hari']?> , <?php echo $baris['jam']?></p>
                                            </th>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- kiri -->
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- kanan -->
                <div class="card">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                        <div class="activity">
                            <div class="activity-item d-flex">
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <p>aku</p>
                            </div>
                        </div>
                    </div> -->
                </div><!-- kanan -->
                <!-- kanan -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Kuliah <span>| Besok</span></h5>
                        <div class="activity">
                            <div class="activity-item d-flex">
                            <table class="">
                                    <tbody>
                                    <?php
                                while ($row=mysqli_fetch_assoc($cekbesok)) {
                                ?>
                                        <tr>
                                            <th scope="row">
                                                <h6><?php echo $row['nama_kelas'] ?></h6>
                                                <p><?php echo $row['hari']?> , <?php echo $row['jam']?></p>
                                            </th>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div><!-- kanan -->
            </div><!-- End Right side columns -->
        </div>
    </section>
</div>

<?php
require('./componen/footer_user.php');
?>