<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login.php");
}
$id_jadwal = $_GET['id_jadwal'];
$id_jamaah = $_SESSION['id_jamaah'];
require('./componen/header_user.php');
?>
<section style="background-image : url(assets/img/bg_tanpa_kop.jpg) ;">
    <div class="container px-4 py-5">
        <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <table class="text-white">
                            <tbody>
                            <?php
                            $query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
                            $hasil=mysqli_query($koneksi,$query);
                            while ($baris=mysqli_fetch_assoc($hasil)) {
                                $name = $baris['nama_lengkap'];
                            ?>
                                <tr>
                                    <th class="ps-3">Nama Lengkap</th>
                                    <td><?php echo $name?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <th class="ps-3">Tanggal</th>
                                    <td><?php echo date('d-m-Y');?></td>
                                </tr>
                                <tr>
                                    <th class="ps-3">Keterangan</th>
                                </tr>   
                            </tbody> 
                        </table>
                        <!-- <div class="form-group col-md-6 mb-3">
                            <label for="inputname" class="text-white">Hari</label>
                            <input type="text" class="form-control mt-1" id="name" name="namE" placeholder="Nama">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail" class="text-white">Tanggal</label>
                            <input type="date" class="form-control mt-1" id="email" name="email" placeholder="Tanggal">
                        </div> -->
                    </div>
                    <div class="mb-3">
                        <!-- <label class="control-label text-white"><b>Keterangan</b></label> -->
                        <select name="status_kehadiran" class="form-control">
                            <option value="" disabled selected>-- Pilih Jenis Kehadiran --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin" >Izin</option>
                            <option value="Sakit" >Sakit</option>
                        </select>
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
require('./componen/footer_user.php');
if (isset($_POST['submit'])) {
    // $tanggal = $_POST["tanggal"];
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');
    // $tanggal = Now();
    $status_kehadiran = $_POST["status_kehadiran"];
    $qryi = "INSERT INTO `presensi` VALUES (NULL,'$tanggal','$waktu','$status_kehadiran','$id_jamaah','$id_jadwal')";
    // $qryi = "INSERT INTO `presensi` VALUES (NULL, NULL,NULL,'$id_jamaah')";
    $hasil = mysqli_query ($koneksi,$qryi);

    if($hasil){
        echo "<Script>window.location='presensi_userr.php'</SCRIPT>";
    } else {
        echo 'gagal';
    }
}
?>