<?php
include "../koneksi.php";
$id=$_GET['id_jamaah'];
$sql = "DELETE FROM jamaah WHERE id_jamaah=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_jamaah.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data jamaah ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_jamaah.php'</SCRIPT>";
}
?>