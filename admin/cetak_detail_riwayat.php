<?php
include '../koneksi.php';
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM history_jamaah where id_jamaah=$id order by id_history desc");
$hasil2 = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah=$id");
$informasi = mysqli_fetch_assoc($hasil2);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Riwayat Kenaikan Kelas {$informasi['nama_lengkap']}.xls");
?>
 <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Induk</th>
                                                    <th>Kelas Lama</th>
                                                    <th>Naik ke Kelas</th>
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
                                                $kls = $baris['id_kelas_lama'];
                                                $klss = $baris['id_kelas_baru'];
                                                if ($kls!=$klss){
                                                    $usr = $baris['id_jamaah'];
                                                    $usrr = mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah='$usr'");
                                                    $jamaah=mysqli_fetch_assoc($usrr);
                                                    ?>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $jamaah['nama_lengkap'] ?></td>
                                                    <td><?php echo $jamaah['no_induk'] ?></td>
                                                    <?php
                                                    
                                                    $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                                    $kelas=mysqli_fetch_assoc($class);
                                                    if (empty($kelas)){
                                                        echo '<td>-</td>';
                                                    }else {
                                                        echo '<td>'.$kelas['nama_kelas'].'</td>';
                                                    }
                                                    ?>
                                                    <?php
                                                    // $klss = $baris['id_kelas_baru'];
                                                    $classs = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$klss'");
                                                    $kelass=mysqli_fetch_assoc($classs);
                                                    if (empty($kelass)){
                                                        echo '<td>-</td>';
                                                    }else {
                                                        echo '<td>'.$kelass['nama_kelas'].'</td>';
                                                    }
                                                }
                                                    ?>
                                                     
                                                    
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>