<?php
include('../koneksi.php');
session_start();
if($_SESSION['role']!="2"){
    header("location:../logout.php");
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
                                    <h3 class="panel-title">Form Tambah Data Jadwal Jamaah</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <div class="col-md-12">
                                        <label class="form-label">Nama Jamaah</label>
                                        <?php 
                                            $selBar=mysqli_query($koneksi, "select * from jamaah where status_pembayaran='diterima'");        
                                            echo '<select name="nama" class="form-control mt-1" required>'; 
                                            while ($rowbar = mysqli_fetch_array($selBar)) {  
                                            echo '<option value="'.$rowbar['id_jamaah'].'">'.$rowbar['nama_lengkap'].'</option>';    
                                            }    
                                            echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pilih Kelas</label>
                                        <br>
                                        <?php    
                                           
                                            $sel=mysqli_query($koneksi, "select * from jadwal");
                                            while ($row = mysqli_fetch_array($sel)) {  
                                                echo '<input type="checkbox" name="jadwal[]" class="form-check-input" value="'.$row['id_jadwal'].'"><label class="form-check-label">'.$row['nama_kelas'].' , '.$row['hari'].'  '.$row['jam'].'</label><br>';
                                            }
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
        $nama = $_POST["nama"];
        
        foreach ($_POST['jadwal'] as $value) {
            $insert = mysqli_query($koneksi,"INSERT into kelas_jadwal(id_jadwal,id_jamaah) VALUES('".$value."','$nama')");
        }
        if($insert){
            echo "<SCRIPT>window.location='data_jadwal.php'</SCRIPT>";
        } else {
            echo 'gagal';
            }
        }
    
        // $nama_kelas = $_POST["nama_kelas"];
        // $hari = $_POST["hari"];
        // $jam = $_POST["jam"];
        // $kelas = $_POST["kelas"];
        // $pengajar = $_POST['pengajar'];
        // $qry = "INSERT INTO jadwal VALUES (NULL,'$nama_kelas','$hari','$jam','$pengajar','$kelas')";
        // $hasil = mysqli_query ($koneksi,$qry);

        // if($hasil){
        //     echo "<SCRIPT>window.location='data_jadwal.php'</SCRIPT>";
        // } else {
        //     echo 'gagal';
        //     }
    
?>
                