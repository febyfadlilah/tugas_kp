<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
// $hasil = mysqli_query($koneksi, "SELECT * FROM jamaah order by id_jamaah desc ");
require('componen_admin/header.php');
?>

            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div id="page-content">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Presensi</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                            <a target="_blank" href="cetak_data_rekap_presensi.php" class="btn btn-success model3" name="excel">Export Excel</a>
                                        </ul>
                                        <form class="model2 d-flex" method="post">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mt-2" style="--bs-scroll-height: 100px;">
                                                <li class="model"><input class="form-control" name="key" type="search" placeholder="Nama or Induk" aria-label="Search"></li>
                                                <li class="model"><button class="btn btn-success" name="submit" type="submit">Search</button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $key = $_POST['key'];
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='diterima' AND (nama_lengkap LIKE '%$key%' OR no_induk LIKE '%$key%') ");
                                    } else {
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='diterima'");
                                    }
                                    ?>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lengkap</th>
                                                    <!-- <th>Detail</th> -->
                                                    <th>No Induk</th>
                                                    <th>Izin</th>
                                                    <th>Hadir</th>
                                                    <th>Sakit</th>
                                                    <th>Total</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php
                                            $no = 0;
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                    $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $baris['nama_lengkap'] ?></td>
                                                    <td><?php echo $baris['no_induk']?></td>
                                                    <?php
                                                    $prg = $baris['id_jamaah'];
                                                    $daftar = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Izin' ");
                                                    $pendaftaran = mysqli_num_rows($daftar);
                                                    ?>
                                                    <td><?php echo $pendaftaran?></td>
                                                    <?php
                                                    $sakit = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Sakit' ");
                                                    $sick = mysqli_num_rows($sakit);
                                                    ?>
                                                    <td><?php echo $sick?></td>
                                                    <?php
                                                    $hdr = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Hadir' ");
                                                    $hadir = mysqli_num_rows($hdr);
                                                    ?>
                                                    <td><?php echo $hadir ?></td>
                                                    <?php
                                                    $ttl = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg'");
                                                    $total = mysqli_num_rows($ttl);
                                                    ?>
                                                    <td><?php echo $total ?></td>
                                                    <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Detail"><a href="detail_absen.php?id_jamaah=<?=$baris['id_jamaah']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >Detail</button></a></p>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--End page content-->
                </div>
            </div>
                    <!--===================================================-->
                    <!--End page content-->
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <?php
                require('componen_admin/navigasi.php');
                ?>

<?php
    require('componen_admin/footer.php');
?>
                