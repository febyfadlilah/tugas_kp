<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
// $hasil = mysqli_query($koneksi, "SELECT * FROM pengajar");
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
                                    <h3 class="panel-title">Data Pengajar</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                            <a target="_blank" href="cetak_pengajar.php" class="btn btn-success model3" name="excel">Export Excel</a>
                                        </ul>
                                        <form class="model2 d-flex" method="post">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mt-2" style="--bs-scroll-height: 100px;">
                                                <li class="model"><input class="form-control" name="key" type="search" placeholder="Masukkan Nama" aria-label="Search"></li>
                                                <li class="model"><button class="btn btn-success" name="submit" type="submit">Search</button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $key = $_POST['key'];
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE nama_pengajar LIKE '%$key%'");
                                    } else {
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM pengajar");
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
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    while ($baris=mysqli_fetch_assoc($hasil)) {
                                                    ?>
                                                    <td><?php echo $baris['nama_pengajar']?></td>
                                                    <td><?php echo $baris['username']?></td>
                                                    <td><?php echo $baris['password']?></td>
                                                    <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_data_pengajar.php?id_pengajar=<?=$baris['id_pengajar']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></a></p>
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
                