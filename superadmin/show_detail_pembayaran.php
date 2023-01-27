<?php

include '../koneksi.php';
session_start();
if($_SESSION['role']!="1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_jamaah = $id order by id_pembayaran desc");
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
                                    <h3 class="panel-title">Data Pembayaran </h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                        </ul>
                                        <div class="row">
                                            <div class="text-left">
                                                <a target="_blank" href="cetak_data_pembayaran_detail.php?id_jamaah=<?=$id?>" class="btn btn-success" name="excel">Export Excel</a>
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
                                                    <th>Nama Pembayar</th>
                                                    <th>No Induk</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
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
                                                <?php
                                                    $usr = $baris['id_jamaah'];
                                                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$usr'");
                                                    $jamaah=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $jamaah['nama_lengkap'] ?></td>
                                                    <td><?php echo $jamaah['no_induk'] ?></td>
                                                    <td><?php echo $baris['nominal']?></td>
                                                    <td><?php echo $baris['tanggal']?></td>
                                                    <td><?php echo $baris['keterangan']?></td>
                                                    <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_data_pembayaran.php?id_pembayaran=<?=$baris['id_pembayaran']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="hapus_data_pembayaran.php?id_pembayaran=<?=$baris['id_pembayaran']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-trash"></span></button></a></p>
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
                