<?php
include '../koneksi.php';
$id = $_GET['id_jadwal'];
$info = mysqli_query($koneksi, "select * from jadwal where id_jadwal=$id");
$informasi=mysqli_fetch_assoc($info);
$hasil = mysqli_query($koneksi, "select * from kelas_jadwal inner join jamaah on kelas_jadwal.id_jamaah=jamaah.id_jamaah where kelas_jadwal.id_jadwal=$id");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jadwal Jamaah Kelas {$informasi['nama_kelas']}.xls");
?>
<div class="panel-heading">
                                    <h3 class="panel-title">Data Jadwal Jamaah</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                        </ul>
                                        <div class="row">
                                            <div class="text-left">
                                                <!-- <a target="_blank" href="cetak_data_jadwal.php" class="btn btn-success" name="excel">Export Excel</a> -->
                                                <!-- <a target="_blank" href="cetak_data_jamaah_pdf.php" class="btn btn-success" name="excel">Export PDF</a> -->
                                                <br>
                                                <table class="fs-18">
                                                    <tr>
                                                        <td>Hari</td>
                                                        <td>:</td>
                                                        <td><?php echo $informasi['hari']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jam</td>
                                                        <td>:</td>
                                                        <td><?php echo $informasi['jam']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengajar</td>
                                                        <td>:</td>
                                                        <?php
                                                        $sta = $informasi['id_pengajar'];
                                                        $stat = mysqli_query($koneksi, "SELECT * FROM pengajar where id_pengajar='$sta'");
                                                        $status=mysqli_fetch_assoc($stat);
                                                        ?>
                                                        <td><?php echo $status['nama_pengajar']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengajar</td>
                                                        <td>:</td>
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
                                                    </tr>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Jamaah</th>
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
                                                    <td><?php echo $baris['nama_lengkap']?></td>
                                                    
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->