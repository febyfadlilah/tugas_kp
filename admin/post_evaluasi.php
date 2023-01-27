<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];

require('componen_admin/header.php');

?>
            <div class="boxed">
                
                <div id="content-container">
                 
                    <div id="page-content">
                        <div id="page-content">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Tambah Evaluasi</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        
                                        <div class="col-md-12">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" value="" placeholder="Masukkan deskripsi evaluasi">
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
        $keterangan = $_POST["keterangan"];
        $insert = "INSERT into evaluasi VALUES(NULL,'$keterangan','open')";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT>window.location='index.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>

                