<?php
include "../koneksi.php";
$id=$_GET['id_jadwal'];
$sql = "DELETE FROM jadwal WHERE id_jadwal=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_jadwal.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data jadwal ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_jadwal.php'</SCRIPT>";
}
?>