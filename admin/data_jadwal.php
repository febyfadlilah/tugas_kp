<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "2"){
    header("location:../logout.php"); 
}
$id_aktor = $_SESSION['id_aktor'];

$hasil = mysqli_query($koneksi, "SELECT * FROM jadwal");
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
                                    <h3 class="panel-title">Data Jadwal Pembelajaran</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                            <a target="_blank" href="cetak_data_jadwal.php" class="btn btn-success model3" name="excel">Export Excel</a>
                                        </ul>
                                        <form class="model2 d-flex" method="post">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mt-2" style="--bs-scroll-height: 100px;">
                                                <li class="model"><input class="form-control" name="key" type="search" placeholder="Masukkan Hari" aria-label="Search"></li>
                                                <li class="model"><button class="btn btn-success" name="submit" type="submit">Search</button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $key = $_POST['key'];
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE hari LIKE '%$key%'");
                                    } else {
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM jadwal");
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
                                                    <th>Nama Kelas</th>
                                                    <th>Hari</th>
                                                    <th>Jam</th>
                                                    <th>Pengajar</th>
                                                    <th>Pengajar Pengganti</th>
                                                    <th>Kelas</th>
                                                    <th>Detail</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 0;
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                    $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $baris['nama_kelas']?></td>
                                                    <td><?php echo $baris['hari']?></td>
                                                    <td><?php echo $baris['jam']?></td>
                                                    <?php
                                                    $sta = $baris['id_pengajar'];
                                                    $stat = mysqli_query($koneksi, "SELECT * FROM pengajar where id_pengajar='$sta'");
                                                    $status=mysqli_fetch_assoc($stat);
                                                    ?>
                                                    <td><?php echo $status['nama_pengajar']?></td>
                                                    <?php
                                                    $peng = $baris['id_pengajar_pengganti'];
                                                    $penga = mysqli_query($koneksi, "SELECT * FROM pengajar where id_pengajar='$peng'");
                                                    $pengajar=mysqli_fetch_assoc($penga);
                                                    if (empty($pengajar)){
                                                        echo '<td>-</td>';
                                                    } else {
                                                        echo '<td>'.$pengajar['nama_pengajar'].'</td>';
                                                    }
                                                    ?>
                                                    
                                                    <?php
                                                    $kls = $baris['id_kelas'];
                                                    $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                                    $kelas=mysqli_fetch_assoc($class);
                                                    ?>
                                                    <td><?php echo $kelas['nama_kelas'] ?></td>
                                                    <td><p data-placement="top" data-toggle="tooltip"><a href="jadwal_user.php?id_jadwal=<?=$baris['id_jadwal']?>"><button class="btn btn-success btn-xs" >show</button></a></p></td>
                                                    <td>
                                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="form_edit_jadwal_kelas.php?id_jadwal=<?=$baris['id_jadwal']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
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