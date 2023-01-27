<?php
include "../koneksi.php";
$id=$_GET['id_pengajar'];
$sql = "DELETE FROM pengajar WHERE id_pengajar=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_pengajar.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data pengajar ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_pengajar.php'</SCRIPT>";
}
?>