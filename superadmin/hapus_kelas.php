<?php
include "../koneksi.php";
$id=$_GET['id_kelas'];
$sql = "DELETE FROM kelas WHERE id_kelas=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_kelas.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data kelas ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_kelas.php'</SCRIPT>";
}
?>