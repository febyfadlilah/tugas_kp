<?php

include '../koneksi.php';
session_start();
if($_SESSION['role']!="2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM history_jamaah WHERE id_jamaah = $id order by id_history desc");
// $data = mysqli_fetch_assoc($hasil);
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
                                    <h3 class="panel-title">Data Riwayat </h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                        </ul>
                                        <div class="row">
                                            <div class="text-left">
                                                <a target="_blank" href="cetak_detail_riwayat.php?id_jamaah=<?=$id?>" class="btn btn-success" name="excel">Export Excel</a>
                                                <!-- <a target="_blank" href="#" class="btn btn-success" name="excel">Export PDF</a> -->
                                            </div>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Induk</th>
                                                    <th>Kelas Lama</th>
                                                    <th>Naik ke Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 0;
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                    $no++;
                                                ?>
                                                <tr>
                                                <?php
                                                $kls = $baris['id_kelas_lama'];
                                                $klss = $baris['id_kelas_baru'];
                                                if ($kls!=$klss){
                                                    $usr = $baris['id_jamaah'];
                                                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$usr'");
                                                    $jamaah=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $jamaah['nama_lengkap'] ?></td>
                                                    <td><?php echo $jamaah['no_induk'] ?></td>
                                                    <?php
                                                    
                                                    $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                                    $kelas=mysqli_fetch_assoc($class);
                                                    if (empty($kelas)){
                                                        echo '<td>-</td>';
                                                    }else {
                                                        echo '<td>'.$kelas['nama_kelas'].'</td>';
                                                    }
                                                    ?>
                                                    <?php
                                                    // $klss = $baris['id_kelas_baru'];
                                                    $classs = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$klss'");
                                                    $kelass=mysqli_fetch_assoc($classs);
                                                    if (empty($kelass)){
                                                        echo '<td>-</td>';
                                                    }else {
                                                        echo '<td>'.$kelass['nama_kelas'].'</td>';
                                                    }
                                                }
                                                    ?>
                                                     
                                                    
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
                