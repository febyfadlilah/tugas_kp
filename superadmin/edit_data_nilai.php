<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="1"){
    header("location:logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_nilai'];
$hasil = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai = $id");
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
                                    <h3 class="panel-title">Form Edit Nilai</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                    <input type="hidden" name="id_nilai" value="<?= $data['id_nilai'] ?>">
                                        <!-- <div class="col-md-6">
                                        <label class="form-label">Nama kkmaah</label>
                                        <input type="text" class="form-control">
                                        </div> -->
                                        <div class="col-md-12">
                                        <label class="form-label">Aspek Penilaian</label>
                                        <input type="text" class="form-control" name="aspek_penilaian" value="<?= $data['aspek_penilaian'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">KKM</label>
                                        <input type="text" class="form-control" name="kkm" value="<?= $data['kkm'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Nilai Total</label>
                                        <input type="text" class="form-control" name="nilai_total" value="<?= $data['nilai_total'] ?>">
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
        $aspek_penilaian = $_POST["aspek_penilaian"];
        $kkm = $_POST["kkm"];
        $nilai_total = $_POST["nilai_total"];
        $insert = "UPDATE nilai set 
        aspek_penilaian = '$aspek_penilaian',
        kkm = '$kkm',
        nilai_total = '$nilai_total' WHERE id_nilai=$id";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT>window.location='data_nilai.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
        }
    }
?>               