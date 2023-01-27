<?php
include 'koneksi.php';
session_start();
if($_SESSION['id_pengajar']==""){
    header("location:login_pengajar.php");
}
$id_pengajar = $_SESSION['id_pengajar'];
$id = $_GET['id_jadwal'];
require('./componen/header_pengajar.php');
?>
<section style="background-image : url(assets/img/bg_tanpa_kop.jpg) ;">
    <div class="container px-4 py-5">
        <div class="row py-5">
                <form class="col-md-9 m-auto " method="post" enctype="multipart/form-data">
                    <!-- <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputname" class="text-white">Hari</label>
                            <input type="text" class="form-control mt-1" id="name" name="hari" placeholder="Hari">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail" class="text-white">Tanggal</label>
                            <input type="date" class="form-control mt-1" id="email" name="tanggal" placeholder="Tanggal">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label class="control-label text-white">Caption</label>
                            <input type="text" name="keterangan" class="form-control mt-1"></input>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <div class="mb-3">
                                <label class="control-label text-white">Upload PDF</label>
                                <input type="file" name="upload" class="form-control mt-1"></input>
                            </div>
                        </div>
                    
                    <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-light btn-lg px-3">Posting</button>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</section>

<?php
require('./componen/footer_pengajar.php');
?>
<?php
include 'koneksi.php';
if (isset($_POST['submit'])){
    $keterangan = $_POST["keterangan"];
    $kelas = $_POST["kelas"];
    $upload = $_FILES['upload']['name'];
    $fotosementara = $_FILES['upload']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "materi/";

    // pindahkan file
    $terupload = move_uploaded_file($fotosementara, $dirUpload.$upload);

    $qry = "INSERT INTO `post` VALUES (NULL, Now(), '$keterangan', '$upload', '$id')";
    $hasil = mysqli_query ($koneksi,$qry);

    if($hasil){
        echo "<SCRIPT> alert('Posting Berhasil');window.location='forum.php?id_jadwal=$id'</SCRIPT>";
    } else {
        echo 'gagal';}
    }
?>