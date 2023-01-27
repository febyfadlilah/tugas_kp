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
                                    <h3 class="panel-title">Form Input Data Admin</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <div class="col-md-6">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password">
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
        $username = $_POST["username"];
        $password = $_POST["password"];
        $qry = "INSERT INTO `aktor` (`id_aktor`, username, password, role) VALUES (NULL,'$username','$password','2')";
        $hasil = mysqli_query ($koneksi,$qry);

        if($hasil){
            echo "<SCRIPT> alert('Pendaftaran Admin Berhasil');window.location='data_admin.php'</SCRIPT>";
        } else {
            echo 'gagal';
            }
    }
?>
                