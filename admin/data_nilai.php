<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "2"){
    header("location:logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM nilai  WHERE id_jamaah = $id order by id_nilai desc");
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
                                    <h3 class="panel-title">Data Nilai</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                        </ul>
                                        <div class="row">
                                            <div class="text-left">
                                                <a target="_blank" href="cetak_data_nilai.php?id_jamaah=<?=$id?>" class="btn btn-success" name="excel">Export Excel</a>
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
                                                    <th>Nama Jamaah</th>
                                                    <th>Aspek Penilaian</th>
                                                    <th>KKM</th>
                                                    <th>Nilai Total</th>
                                                    <th>Edit</th>
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
                                                    $jamaah=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $jamaah['nama_lengkap'] ?></td>
                                                    <td><?php echo $baris['aspek_penilaian'] ?></td>
                                                    <td><?php echo $baris['kkm'] ?></td>
                                                    <td><?php echo $baris['nilai_total'] ?></td>
                                                    <td>
                                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_data_nilai.php?id_nilai=<?=$baris['id_nilai']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                    </td>
                                                </tr>
                                                <?php } ?>
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
                