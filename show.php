<?php
include 'koneksi.php';
$id = $_GET['id_post'];
$post = mysqli_query($koneksi, "select * from post where id_post = '$id'");
$cek = mysqli_fetch_assoc($post);
$nm = $cek['upload'];
//memanggil file example.pdf yang berada di folder bernama file
$filePath = "materi/".$nm;
//Membuat kondisi jika file tidak ada
if (!file_exists($filePath)) {
    echo "The file $filePath does not exist";
    die();
}
//nama file untuk tampilan
$filename="$nm";
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
//membaca dan menampilkan file
readfile($filePath);
?>