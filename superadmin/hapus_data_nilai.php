<?php
include "../koneksi.php";
$id=$_GET['id_nilai'];
$sql = "DELETE FROM nilai WHERE id_nilai=$id";
$hasil = mysqli_query($koneksi,$sql);
if ($hasil){
    echo "<SCRIPT>window.location='data_nilai.php'</SCRIPT>";
} else {
    echo "<SCRIPT>alert('Mohon maaf anda tidak bisa menghapus data nilai ini karena data ini masih terhubung dengan tabel lainnya'):window.location='data_nilai.php'</SCRIPT>";
}
?>