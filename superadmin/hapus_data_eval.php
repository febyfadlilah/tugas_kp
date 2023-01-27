<?php
include "../koneksi.php";
$id=$_GET['id_evaluser'];
$sql = "DELETE FROM evaluasi_user WHERE id_evaluser=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_evaluasi.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data evaluasi ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_presensi.php'</SCRIPT>";
}
?>