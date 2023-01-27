<?php
session_start();
include "../koneksi.php";
$cek = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$cek2 = mysqli_fetch_assoc($cek);
$cek3 = $cek2['no_induk'];
$hasil = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_jamaah = $id order by id_nilai desc");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Nilai No Induk {$cek3}.xls");
?>

                                 <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nama Jamaah</th>
                                                    <th>Aspek Penilaian</th>
                                                    <th>KKM</th>
                                                    <th>Nilai Total</th>
                                                    
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
                                                    
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
    
                        