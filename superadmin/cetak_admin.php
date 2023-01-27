<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM aktor where role='2'");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Admin.xls");
?>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0" border="1px">
            <thead class="bg-success">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no=0;
                while ($baris=mysqli_fetch_assoc($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $baris['username']?></td>
                    <td><?php echo $baris['password']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
<script>window.print()</script>