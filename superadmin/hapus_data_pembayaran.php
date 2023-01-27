<?php
include "../koneksi.php";
$id=$_GET['id_pembayaran'];
$sql = "DELETE FROM pembayaran WHERE id_pembayaran=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_pembayaran.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data pembayaran ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_pembayaran.php'</SCRIPT>";
}
?>