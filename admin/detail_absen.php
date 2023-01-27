<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "2"){
    header("location:logout.php");
}
$id = $_GET['id_jamaah'];
$id_aktor = $_SESSION['id_aktor'];
$hasil = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah=$id");
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
                                        </ul>
                                        <div class="row">
                                            <div class="text-left">
                                                <a target="_blank" href="cetak_detail_absen.php?id_jamaah=<?=$id?>" class="btn btn-success" name="excel">Export Excel</a>
                                                <!-- <a target="_blank" href="#" class="btn btn-success" name="excel">Export PDF</a> -->
                                            </div>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>Status Kehadiran</th>
                                                    <!-- <th>Edit</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
                                                <?php
                                                    // $usr = $baris['id_jamaah'];
                                                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$id'");
                                                    $user=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $user['nama_lengkap'] ?></td>
                                                    <td><?php echo $baris['tanggal']?></td>
                                                    <td><?php echo $baris['waktu']?></td>
                                                    <td><?php echo $baris['status_kehadiran']?></td>
                                                    <!-- <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_data_presensi.php?id_presensi=<?=$baris['id_presensi']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                    </td> -->
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
                