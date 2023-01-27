<?php
include('../koneksi.php');
session_start();
if($_SESSION['role']!="1"){
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
                                    <h3 class="panel-title">Form Input Bukti Pembayaran</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <div class="col-md-6">
                                        <label class="form-label">Nama</label>
                                        <!-- <input type="text" class="form-control"> -->
                                        <?php
                                        $sel=mysqli_query($koneksi, "SELECT * FROM jamaah ORDER BY id_jamaah");        
                                        echo '<select name="pembayar" class="form-control">';
                                        while ($row = mysqli_fetch_array($sel)) {    
                                        echo '
                                        <option value="'.$row['id_jamaah'].'">'.$row['nama_lengkap'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan">
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
        $jumlah = $_POST["jumlah"];
        $tanggal = $_POST["tanggal"];
        $keterangan = $_POST["keterangan"];
        $qry = "INSERT INTO pembayaran VALUES (NULL,'$tanggal','$jumlah','$keterangan','$pembayar')";
        $hasil = mysqli_query ($koneksi,$qry);

        if($hasil){
            echo "<SCRIPT> alert('Input Data Pembayaran Berhasil');window.location='data_pembayaran.php'</SCRIPT>";
        } else {
            echo 'gagal';
    }
    }


?>
                