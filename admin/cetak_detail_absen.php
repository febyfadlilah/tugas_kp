<?php
include '../koneksi.php';
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah=$id");
$hasil2 = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah=$id");
$informasi = mysqli_fetch_assoc($hasil2);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jadwal Jamaah Kelas {$informasi['nama_lengkap']}.xls");
?>
<!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>Status Kehadiran</th>
                                                    <!-- <th>Edit</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
                                                <?php
                                                    // $usr = $baris['id_jamaah'];
                                                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$id'");
                                                    $user=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $user['nama_lengkap'] ?></td>
                                                    <td><?php echo $baris['tanggal']?></td>
                                                    <td><?php echo $baris['waktu']?></td>
                                                    <td><?php echo $baris['status_kehadiran']?></td>
                                                    <!-- <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_data_presensi.php?id_presensi=<?=$baris['id_presensi']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                    </td> -->
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->