<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$tamu = mysqli_query($koneksi, "SELECT * FROM tamu where status_kunjungan='belum'");
$jumlah_tamu_belum = mysqli_num_rows($tamu);
$tam = mysqli_query($koneksi, "SELECT * FROM tamu where status_kunjungan='sudah'");
$jumlah_tamu_sudah = mysqli_num_rows($tam);
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
                        <div class="row">
                            <a href="data_tamu_belum.php">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">
                                <!--Registered User-->
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <!-- <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="fa fa-file"></i> -->
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>Data <br>Tamu Belum <br>Reservasi</h4>
                                        <h1 style="color:black;"><?php echo $jumlah_tamu_belum ?></h1>
                                        <!-- <p class="text-2x mar-no text-thin text-right"><i class="fa fa-file"></i></p>
                                        <p class="h5 mar-no text-right"><a href="dataPengajuan.php">Diterima</a></p> -->
                                    </div>
                                </div>
                            </div></a>
                            <a href="data_tamu.php">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xm-12">
                                <!--Registered User-->
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <!-- <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="fa fa-file"></i> -->
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>Data <br>Tamu Sudah <br>Reservasi</h4>
                                        <h1 style="color:pink;"><?php echo $jumlah_tamu_sudah ?></h1>
                                        <!-- <p class="text-2x mar-no text-thin text-right"><i class="fa fa-file"></i></p>
                                        <p class="h5 mar-no text-right"><a href="dataPengajuan.php">Diterima</a></p> -->
                                    </div>
                                </div>
                            </div></a>
                        </div>
                     </div>
                    <!--===================================================-->
                    <!--End page content-->
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