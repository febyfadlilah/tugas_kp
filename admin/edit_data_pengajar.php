<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_pengajar'];
$hasil = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE id_pengajar = '$id'");
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
                                    <h3 class="panel-title">Form Edit Data Pengajar</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <input type="hidden" name="id_pengajar" value="<?= $data['id_pengajar'] ?>">
                                        <div class="col-md-12">
                                        <label class="form-label">Nama Pengajar</label>
                                        <input type="text" class="form-control" name="nama_pengajar" value="<?= $data['nama_pengajar'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" value="<?= $data['password'] ?>">
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
        $nama_pengajar = $_POST["nama_pengajar"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $insert = "UPDATE pengajar set 
            nama_pengajar = '$nama_pengajar',
            username = '$username',
            password = '$password' WHERE id_pengajar=$id";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT> alert('Perubahan Data Berhasil');window.location='data_pengajar.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>
                