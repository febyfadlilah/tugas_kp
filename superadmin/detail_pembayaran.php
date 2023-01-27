<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_jamaah = $id");
$data = mysqli_fetch_assoc($hasil);
require('componen_admin/header.php');

?>

<table>
    <tr>
        <th>Tanggal</th>
        <th>Nominal</th>
        <th>Keterangan</th>
    </tr>
    <tr>
    <?php
    while ($baris=mysqli_fetch_assoc($data)) {
    ?>
        <td><?php echo $baris['tanggal']?></td>
        <td><?php echo $baris['nominal']?></td>
        <td><?php echo $baris['keterangan']?></td>
    <?php } ?>
    </tr>
</table>