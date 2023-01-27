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
                                    <h3 class="panel-title">Form Tambah Data Jadwal Kelas</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                    <input type="hidden" name="id_jadwal" value="<?=$data['id_jadwal'] ?>">
                                        <div class="col-md-12">
                                        <label class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas" value="">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Hari</label>
                                        <select name="hari" class="form-control" id="">
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" name="hari" value=""> -->
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Jam</label>
                                        <input type="text" class="form-control" name="jam" value="">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pengajar</label>
                                        <?php
                                        $peng=mysqli_query($koneksi, "SELECT * from pengajar ORDER BY id_pengajar");        
                                        echo '<select name="pengajar" class="form-control" required>';
                                        echo '<option value="">- Pilih Pengajar -</option>';;
                                        while ($pengajar = mysqli_fetch_array($peng)) {    
                                        echo '
                                        <option value="'.$pengajar['id_pengajar'].'">'.$pengajar['nama_pengajar'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        
                                        <!-- <input type="text" class="form-control"> -->
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pengajar Pengganti</label>
                                        <?php
                                        $peng=mysqli_query($koneksi, "SELECT * from pengajar ORDER BY id_pengajar");        
                                        echo '<select name="pengganti" class="form-control">';
                                        echo '<option value="">- Pilih Pengajar -</option>';;
                                        while ($pengajar = mysqli_fetch_array($peng)) {    
                                        echo '
                                        <option value="'.$pengajar['id_pengajar'].'">'.$pengajar['nama_pengajar'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        
                                        <!-- <input type="text" class="form-control"> -->
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label">Kelas</label>
                                        <?php
                                        $kel=mysqli_query($koneksi, "SELECT * from kelas ORDER BY id_kelas");        
                                        echo '<select name="kelas" class="form-control">';
                                        echo '<option value="">- Pilih Kelas -</option>';;
                                        while ($kelas = mysqli_fetch_array($kel)) {    
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
        $nama_kelas = $_POST["nama_kelas"];
        $hari = $_POST["hari"];
        $jam = $_POST["jam"];
        $kelas = $_POST["kelas"];
        $pengajar = $_POST['pengajar'];
        $qry = "INSERT INTO jadwal VALUES (NULL,'$nama_kelas','$hari','$jam','$pengajar','$pengganti','$kelas')";
        $hasil = mysqli_query ($koneksi,$qry);

        if($hasil){
            echo "<SCRIPT>window.location='data_jadwal.php'</SCRIPT>";
        } else {
            echo 'gagal';
            }
    }
?>
                