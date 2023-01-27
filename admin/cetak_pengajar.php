<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM pengajar");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengajar.xls");
?>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0" border="1px">
            <thead class="bg-success">
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                while ($baris=mysqli_fetch_assoc($hasil)) {
                ?>
                <tr>
                    <td><?php echo $baris['nama_pengajar']?></td>
                    <td><?php echo $baris['username']?></td>
                    <td><?php echo $baris['password']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
<script>window.print()</script>