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
                                    <h3 class="panel-title">Form Tambah Data Kelas</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        
                                        <div class="col-md-12">
                                        <label class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas" value="" placeholder="Masukkan angka dan huruf tanpa tanda baca">
                                        </div>
                                        <div class="col-md-12">
                                        <label class="form-label">Program</label>
                                        <!-- <input type="text" class="form-control"> -->
                                        <?php
                                        $selBar=mysqli_query($koneksi, "SELECT * FROM program ORDER BY id_program ");        
                                        echo '<select name="program" class="form-control" required value="$data["id_program"]">';
                                        echo '<option>- Pilih Program Pilihan -</option>';
                                        while ($rowbar = mysqli_fetch_array($selBar)) {  
                                        echo '<option value="'.$rowbar['id_program'].'">'.$rowbar['nama_program'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
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
        $program = $_POST["program"];
        $insert = "INSERT into kelas VALUES(NULL,'$nama_kelas','$program')";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT>window.location='data_kelas.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>

                