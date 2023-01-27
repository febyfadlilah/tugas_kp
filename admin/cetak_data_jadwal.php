<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM jadwal");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jadwal.xls");
?>
     <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Hari</th>
                                                    <th>Jam</th>
                                                    <th>Pengajar</th>
                                                    <th>Pengajar Pengganti</th>
                                                    <th>Kelas</th>
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
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
<script>window.print()</script>