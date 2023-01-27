<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_pembayaran'];
$hasil = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran = $id");
$data = mysqli_fetch_assoc($hasil);
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
                                    <h3 class="panel-title">Form Edit Data Pembayaran</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                    <input type="hidden" name="id_pembayaran" value="<?= $data['id_pembayaran'] ?>">
                                        <div class="col-md-6">
                                        <label class="form-label">Nama</label>
                                        
                                        <?php
                                        $id_pem = $data['id_jamaah'];
                                        $sel=mysqli_query($koneksi, "SELECT * FROM jamaah where id_jamaah= $id_pem");        
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
                                        <input type="text" class="form-control" name="jumlah" value="<?= $data['nominal'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" value="<?= $data['keterangan'] ?>">
                                        </div>
                                        <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-success form-control" name="edit">Submit</button>
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
    if (isset($_POST['edit'])){
        $pembayar = $_POST["pembayar"];
        $jumlah = $_POST["jumlah"];
        $tanggal = $_POST["tanggal"];
        $keterangan = $_POST["keterangan"];
        $insert = "UPDATE pembayaran set 
            id_jamaah = '$pembayar',
            nominal = '$jumlah',
            keterangan = '$keterangan',
            tanggal = '$tanggal' WHERE id_pembayaran=$id";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT> alert('Perubahan Data Berhasil');window.location='data_pembayaran.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>
                