<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='ditolak'");
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
                            <!-- <a target="_blank" href="cetak_data_jamaah.php"><button name="excel">Export Excel</button></a>
                            <a target="_blank" href="cetak_data_jamaah_pdf.php"><button name="excel">Export PDF</button></a> -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Jamaah</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                        </ul>
                                        <!-- <div class="row">
                                            <div class="text-left">
                                                <a target="_blank" href="cetak_data_jamaah.php" class="btn btn-success" name="excel">Export Excel</a>
                                                <a target="_blank" href="cetak_data_jamaah_pdf.php" class="btn btn-success" name="excel">Export PDF</a>
                                            </div>
                                        </div> -->
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
                                                    <th>Nama Lengkap</th>
                                                    <th>Nama Panggilan</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Usia</th>
                                                    <th>Alamat</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Pendidikan Terakhir</th>
                                                    <th>No. WhatsApp</th>
                                                    <th>Program</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $baris['nama_lengkap']?></td>
                                                    <td><?php echo $baris['nama_panggilan']?></td>
                                                    <td><?php echo $baris['tempat_lahir']?></td>
                                                    <td><?php echo $baris['tanggal_lahir']?></td>
                                                    <td><?php echo $baris['jenis_kelamin']?></td>
                                                    <td><?php echo $baris['usia']?></td>
                                                    <td><?php echo $baris['alamat']?></td>
                                                    <td><?php echo $baris['pekerjaan']?></td>
                                                    <td><?php echo $baris['pendidikan']?></td>
                                                    <td><?php echo $baris['no_whatsapp']?></td>
                                                    <?php
                                                    $prg = $baris['id_program'];
                                                    $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                                    $program=mysqli_fetch_assoc($pro);
                                                    ?>
                                                    <td><?php echo $program['nama_program'] ?></td>
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
                