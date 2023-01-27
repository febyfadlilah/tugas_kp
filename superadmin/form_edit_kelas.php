<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_kelas'];
$hasil = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas = '$id' ");
$data = mysqli_fetch_assoc($hasil);
require('componen_admin/header.php');

?>

            <div class="boxed">
                
                <div id="content-container">
                 
                    <div id="page-content">
                        <div id="page-content">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit Data Kelas</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <input type="hidden" name="id_kelas" value="<?= $data['id_kelas'] ?>">
                                        <div class="col-md-12">
                                        <label class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas" value="<?= $data['nama_kelas'] ?>">
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
        $nama_kelas = $_POST["nama_kelas"];
        $insert = "UPDATE kelas set 
            nama_kelas = '$nama_kelas' WHERE id_kelas=$id";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT>window.location='data_kelas.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>

                