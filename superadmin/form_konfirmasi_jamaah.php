<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="1"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
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
                            <center><img src="../bukti/<?= $data['bukti_pembayaran']?>" width="500"></center>
                            <br> 
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Konfirmasi</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post">
                                        <div class="col-md-6">
                                        <label class="form-label">Nama Jamaah</label>
                                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Status Pembayaran</label>
                                        <select name="status_pembayaran" class="form-control">
                                                <option value="" disabled selected>-- Pilih Status Pembayaran --</option>

                                                <option value="diterima">Diterima</option>
                                                <option value="ditolak" >Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">No. Induk</label>
                                        <input type="text" class="form-control" name="no_induk" value="<?= $data['no_induk'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" value="<?= $data['password'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Kelas</label>
                                        <?php
                                        $kls=mysqli_query($koneksi, "SELECT * from kelas ORDER BY id_kelas");        
                                        echo '<select name="kelas" class="form-control" required>';
                                        // echo '<option value="'.$data['id_kelas']. '"></option>';
                                        echo '<option value="'.$data['id_kelas'].'">-- Pilih Kelas --</option>';;
                                        while ($kelas = mysqli_fetch_array($kls)) {    
                                        echo '
                                        <option value="'.$kelas['id_kelas'].'">'.$kelas['nama_kelas'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Status Jamaah</label>
                                        <?php
                                        $st=mysqli_query($koneksi, "SELECT * from status ORDER BY id_status");        
                                        echo '<select name="status" class="form-control" required>';
                                        echo '<option value="'.$data['id_status'].'">-- Pilih Status --</option>';
                                        '<option selected></option>';
                                        while ($status = mysqli_fetch_array($st)) {    
                                        echo '
                                        <option value="'.$status['id_status'].'">'.$status['nama_status'].'</option>';    
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
        $no_induk = $_POST["no_induk"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $kelas = $_POST['kelas'];
        $status_pembayaran = $_POST['status_pembayaran'];

        $insert = "UPDATE jamaah set 
            no_induk = '$no_induk',
            nama_lengkap = '$nama_lengkap',
            id_status = '$status', 
            password = '$password',
            status_pembayaran = '$status_pembayaran',
            id_kelas = '$kelas' WHERE id_jamaah=$id";
        
        $data = mysqli_query($koneksi, "select * from jamaah where no_induk='$no_induk' ");
        $qry = "INSERT INTO pembayaran VALUES (NULL,Now(),'150.000','Pendaftaran','$id')";
        $cek = mysqli_fetch_array($data);
        if (empty($cek)){
            $hasil = mysqli_query($koneksi,$insert);
            if($hasil){
                echo "<SCRIPT>window.location='jamaah.php'</SCRIPT>";
                $proses = mysqli_query($koneksi,$qry);

            }else {
                echo 'gagal';
            }
        } else {
            echo "<SCRIPT>alert('No Induk Tidak Boleh Sama');window.location='konfirmasi_jamaah.php'</SCRIPT>";
        }
    }

?>
                