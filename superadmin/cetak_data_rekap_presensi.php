<?php
include "../koneksi.php";
// $hasil = mysqli_query($koneksi,"select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah inner join jadwal as jad on k.id_jadwal = jad.id_jadwal");
$hasil = mysqli_query($koneksi, "SELECT DISTINCT id_jamaah,
(SELECT COUNT(status_kehadiran)
FROM presensi
WHERE (status_kehadiran = 'Hadir')) AS Hadir,
(SELECT COUNT(status_kehadiran)
FROM presensi
WHERE(status_kehadiran = 'Sakit')) AS Sakit,
(SELECT COUNT(status_kehadiran)
FROM presensi
WHERE(status_kehadiran = 'Izin')) AS Izin,
(SELECT COUNT(status_kehadiran)
FROM presensi
WHERE (status_kehadiran = 'sakit') OR (status_kehadiran = 'izin') OR status_kehadiran = 'hadir') AS Total
FROM presensi");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Rekap Presensi.xls");
?>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Jamaah</th>
                                                    <th>Izin</th>
                                                    <th>Sakit</th>
                                                    <th>Hadir</th>
                                                    <th>Total</th>
                                                    <!-- <th>Detail</th> -->
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
                                                    <?php
                                                    $prg = $baris['id_jamaah'];
                                                    $pro = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah ='$prg'");
                                                    $program=mysqli_fetch_assoc($pro);
                                                    ?>
                                                    <td><?php echo $program['nama_lengkap'] ?></td>
                                                    <?php
                                                    $daftar = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Izin' ");
                                                    $pendaftaran = mysqli_num_rows($daftar);
                                                    ?>
                                                    <td><?php echo $pendaftaran?></td>
                                                    <?php
                                                    $sakit = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Sakit' ");
                                                    $sick = mysqli_num_rows($sakit);
                                                    ?>
                                                    <td><?php echo $sick?></td>
                                                    <?php
                                                    $hdr = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg' and status_kehadiran ='Hadir' ");
                                                    $hadir = mysqli_num_rows($hdr);
                                                    ?>
                                                    <td><?php echo $hadir ?></td>
                                                    <?php
                                                    $ttl = mysqli_query($koneksi, "SELECT * FROM presensi where id_jamaah='$prg'");
                                                    $total = mysqli_num_rows($ttl);
                                                    ?>
                                                    <td><?php echo $total ?></td>
                                                    <!-- <td><a href="detail_absen.php?id_jamaah=<?=$prg?>"><button>Detail</button></a></td> -->
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->