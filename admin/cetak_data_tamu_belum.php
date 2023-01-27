<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM tamu where status_kunjungan ='belum'");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Tamu Belum Reservasi.xls");
?>
<!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
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
                                                    <th>Program</th>
                                                    <th>Tanggal Pengisian</th>
                                                    <th>Tanggal Berkunjung</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
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
                                                    <td><?php echo $baris['tanggal_berkunjung']?></td>
                                                    <?php
                                                    $prg = $baris['id_program'];
                                                    $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                                    $program=mysqli_fetch_assoc($pro);
                                                    ?>
                                                    <td><?php echo $program['nama_program'] ?></td>
                                                    <td><?php echo $baris['tanggal']?></td>
                                                    <td><?php echo $baris['tanggal_berkunjung']?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
<script>window.print()</script>