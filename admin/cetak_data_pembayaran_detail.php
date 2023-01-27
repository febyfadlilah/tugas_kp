<?php
include '../koneksi.php';
$id = $_GET['id_jamaah'];
$cek = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$cek2 = mysqli_fetch_assoc($cek);
$cek3 = $cek2['no_induk'];
$hasil = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_jamaah = $id order by id_pembayaran desc");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Detail Data Pembayaran No Induk {$cek3}.xls");
?>
<!--Data Table-->
                               <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nama Pembayar</th>
                                                    <!-- <th>Detail</th> -->
                                                    <th>Jumlah</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    
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
                                                    <td><?php echo $baris['nominal']?></td>
                                                    <td><?php echo $baris['tanggal']?></td>
                                                    <td><?php echo $baris['keterangan']?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
<script>window.print()</script>