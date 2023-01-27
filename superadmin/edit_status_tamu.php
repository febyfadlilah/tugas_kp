<?php
include '../koneksi.php';
$id = $_GET['id_tamu'];
 if (isset($_POST['sudah'])){
    // $status_kunjungan = 'sudah';
    $insert = "UPDATE tamu set 
    status_kunjungan = 'sudah' WHERE id_tamu=$id"; 
    $hasil = mysqli_query($koneksi,$insert);
    if($hasil){
        echo "<SCRIPT>window.location='data_tamu_belum.php'</SCRIPT>";
    }else {
        echo 'gagal';
    }
}
?>