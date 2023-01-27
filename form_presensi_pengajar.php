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
                <form class="col-md-9 m-auto " method="post" role="form">
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
                        <div class="form-group col-md-6 mb-3">
                            <label class="control-label text-white">Nama</label>
                            <?php    
                                echo '</select>';
                                $selBar=mysqli_query($koneksi, "select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah where k.id_jadwal=$id");        
                                echo '<select name="nama" class="form-control mt-1" required>'; 
                                while ($rowbar = mysqli_fetch_array($selBar)) {  
                                echo '<option value="'.$rowbar['id_jamaah'].'">'.$rowbar['nama_lengkap'].'</option>';    
                                }    
                                echo '</select>';
                            ?>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <div class="mb-3">
                                <label class="control-label text-white">Keterangan</label>
                                    <select name="status_kehadiran" class="form-control mt-1">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin" >Izin</option>
                                        <option value="Sakit" >Sakit</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" name="submit" class="btn btn-outline-light btn-lg px-3">Kumpulkan</button>
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
if (isset($_POST['submit'])) {
    // $tanggal = $_POST["tanggal"];
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');
    $status_kehadiran = $_POST["status_kehadiran"];
    $nama = $_POST["nama"];
    $qryi = "INSERT INTO `presensi` VALUES (NULL,'$tanggal','$waktu','$status_kehadiran','$nama','$id')";
    $hasil = mysqli_query ($koneksi,$qryi);

    if($hasil){
        echo "<Script>window.location='rekap_presensi.php?id_jadwal=$id'</SCRIPT>";
    } else {
        echo 'gagal';
    }
}
?>
