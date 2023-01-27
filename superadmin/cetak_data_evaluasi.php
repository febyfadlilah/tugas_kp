<?php
session_start();
include "../koneksi.php";
$id = $_GET['id_jamaah'];
$cek = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$cek2 = mysqli_fetch_assoc($cek);
$cek3 = $cek2['no_induk'];
$hasil = mysqli_query($koneksi, "SELECT * FROM evaluasi_user WHERE id_jamaah = $id order by id_evaluser desc");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Evaluasi No Induk {$cek3}.xls");
?>
<!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nama Jamaah</th>
                                                    <th>Kritik</th>
                                                    <th>Saran</th>
                                                    <th>Kelas</th>
                                                    
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
                                                    <td><?php echo $baris['kritik'] ?></td>
                                                    <td><?php echo $baris['saran'] ?></td>
                                                    <?php
                                                    $kls = $baris['id_kelas'];
                                                    $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                                    $kelas=mysqli_fetch_assoc($class);
                                                    ?>
                                                    <td><?php echo $kelas['nama_kelas'] ?></td>
                                                    
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>