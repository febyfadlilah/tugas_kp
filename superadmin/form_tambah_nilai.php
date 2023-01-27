<?php
include('../koneksi.php');
session_start();
if($_SESSION['role']!="1"){
    header("location:logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
require('componen_admin/header.php');
?>

            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                     <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div id="page-content">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Input Nilai</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post" action="">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Jamaah</label>
                                        <!-- <input type="text" class="form-control"> -->
                                        <?php
                                        $sel=mysqli_query($koneksi, "SELECT * FROM jamaah WHERE status_pembayaran='diterima' ORDER BY id_jamaah");        
                                        echo '<select name="pembayar" class="form-control">';
                                        while ($row = mysqli_fetch_array($sel)) {    
                                        echo '
                                        <option value="'.$row['id_jamaah'].'">'.$row['nama_lengkap'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Aspek Penilaian</label>
                                        <input type="text" class="form-control" name="aspek_penilaian">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">KKM</label>
                                        <input type="text" class="form-control" name="kkm">
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label class="form-label">Nilai Total</label>
                                        <input type="text" class="form-control" name="nilai_total">
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label">Kelas</label>
                                        <!-- <input type="text" class="form-control" value=""> -->
                                        <?php
                                        $kls=mysqli_query($koneksi, "SELECT * from kelas ORDER BY id_kelas");        
                                        echo '<select name="kelas" class="form-control" required>';
                                        echo '<option>- Pilih Kelas -</option>';
                                        while ($kelas = mysqli_fetch_array($kls)) {     
                                        echo '
                                        <option value="'.$kelas['id_kelas'].'">'.$kelas['nama_kelas'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-success form-control" name="submit">Submit</button>
                                        </div>
                                    </form>
                                <!--===================================================-->
                                <!--End Data Table-->
                                </div>
                            </div>
                        </div>
                    <!--End page content-->
                </div>
            </div>
                    <!--===================================================-->
                    <!--End page content-->
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <?php
                require('componen_admin/navigasi.php');
                ?>

<?php
    require('componen_admin/footer.php');
    if (isset($_POST['submit'])){
        $pembayar = $_POST['pembayar'];
        $aspek_penilaian = $_POST["aspek_penilaian"];
        $kkm = $_POST["kkm"];
        $kelas = $_POST["kelas"];
        $nilai_total = $_POST["nilai_total"];
        $qry = "INSERT INTO nilai VALUES (NULL,'$aspek_penilaian','$kkm','$nilai_total','$pembayar','$kelas')";
        $hasil = mysqli_query ($koneksi,$qry);

        if($hasil){
            echo "<SCRIPT>window.location='data_nilai.php'</SCRIPT>";
        } else {
            echo 'gagal';
    }
    }
?>
                