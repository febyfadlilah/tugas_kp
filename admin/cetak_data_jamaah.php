<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah where status_pembayaran='diterima'");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Jamaah.xls");
?>
<!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No. Induk</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Nama Panggilan</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Usia</th>
                                                    <th>Alamat</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Pendidikan Terakhir</th>
                                                    <th>No. WhatsApp</th>
                                                    <th>Password</th>
                                                    <th>Status</th>
                                                    <th>Kelas</th>
                                                    <th>Program</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $baris['no_induk']?></td>
                                                    <td><?php echo $baris['nama_lengkap']?></td>
                                                    <td><?php echo $baris['nama_panggilan']?></td>
                                                    <td><?php echo $baris['tempat_lahir']?></td>
                                                    <td><?php echo $baris['tanggal_lahir']?></td>
                                                    <td><?php echo $baris['jenis_kelamin']?></td>
                                                    <td><?php echo $baris['usia']?></td>
                                                    <td><?php echo $baris['alamat']?></td>
                                                    <td><?php echo $baris['pekerjaan']?></td>
                                                    <td><?php echo $baris['pendidikan']?></td>
                                                    <td><?php echo $baris['no_whatsapp']?></td>
                                                    <td><?php echo $baris['password']?></td>
                                                    <?php
                                                    $sta = $baris['id_status'];
                                                    $stat = mysqli_query($koneksi, "SELECT * FROM status where id_status='$sta'");
                                                    $status=mysqli_fetch_assoc($stat);
                                                    ?>
                                                    <td><?php echo $status['nama_status']?></td>
                                                    <?php
                                                    $kls = $baris['id_kelas'];
                                                    $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                                    $kelas=mysqli_fetch_assoc($class);
                                                    ?>
                                                    <td><?php echo $kelas['nama_kelas'] ?></td>
                                                    <?php
                                                    $prg = $baris['id_program'];
                                                    $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                                    $program=mysqli_fetch_assoc($pro);
                                                    ?>
                                                    <td><?php echo $program['nama_program'] ?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
<script>window.print()</script>