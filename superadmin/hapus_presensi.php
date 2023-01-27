<?php
include "../koneksi.php";
$id=$_GET['id_presensi'];
$sql = "DELETE FROM presensi WHERE id_presensi=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_presensi.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data presensi ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_presensi.php'</SCRIPT>";
}
?>