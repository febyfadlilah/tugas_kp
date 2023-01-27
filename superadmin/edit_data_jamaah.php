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
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit Data Jamaah</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post" action="">
                                        <input type="hidden" name="id_jamaah" value="<?= $data['id_jamaah'] ?>">
                                        <div class="col-md-6">
                                        <label class="form-label">No Induk</label>
                                        <input type="text" name="no_induk" class="form-control" value="<?= $data['no_induk'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Nama Panggilan</label>
                                        <input type="text" class="form-control" name="nama_panggilan" value="<?= $data['nama_panggilan'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                            <option value="Laki-Laki">Laki-laki</option>
                                            <option value="Perempuan" >Perempuan</option>
                                        </select>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Usia</label>
                                        <input type="text" class="form-control" name="usia" value="<?= $data['usia'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <input name="pekerjaan" type="text" class="form-control" value="<?= $data['pekerjaan'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pendidikan terakhir</label>
                                        <input type="text" name="pendidikan" class="form-control" value="<?= $data['pendidikan'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">No. WhatsApp</label>
                                        <input type="text" name="no_whatsapp" class="form-control" value="<?= $data['no_whatsapp'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control" value="<?= $data['password'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Status Jamaah</label>
                                        <?php
                                        $st=mysqli_query($koneksi, "SELECT * from status ORDER BY id_status");        
                                        echo '<select name="status" class="form-control" required>';
                                        '<option selected></option>';
                                        echo '<option value="'.$data['id_status'].'">'.$data['id_status'].'</option>';
                                        while ($status = mysqli_fetch_array($st)) {    
                                        echo '
                                        <option value="'.$status['id_status'].'">'.$status['nama_status'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <!-- <div class="col-md-6">
                                        <label class="form-label">KTP</label>
                                        <input type="file" class="form-control" value="<?= $data['ktp'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">KK</label>
                                        <input type="file" class="form-control" value="<?= $data['kk'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Foto</label>
                                        <input type="file" class="form-control" value="<?= $data['foto'] ?>">
                                        </div> -->
                                        <div class="col-md-6">
                                        <label class="form-label">Kelas</label>
                                        <!-- <input type="text" class="form-control" value=""> -->
                                        <?php
                                        $kls=mysqli_query($koneksi, "SELECT * from kelas ORDER BY id_kelas");        
                                        echo '<select name="kelas" class="form-control" required>';
                                        echo '<option value="'.$data['id_kelas'].'">'.$data['id_kelas'].'</option>';
                                        '<option selected></option>';
                                        while ($kelas = mysqli_fetch_array($kls)) {    
                                        echo '
                                        <option value="'.$kelas['id_kelas'].'">'.$kelas['nama_kelas'].'</option>';    
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
        $no_induk = $_POST["no_induk"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $nama_panggilan = $_POST["nama_panggilan"];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $usia = $_POST['usia'];
        $pekerjaan = $_POST['pekerjaan'];
        $pendidikan = $_POST['pendidikan'];
        $alamat = $_POST['alamat'];
        $no_whatsapp = $_POST['no_whatsapp'];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $kelas = $_POST['kelas'];
        $insert = "UPDATE jamaah set 
            no_induk = '$no_induk',
            nama_lengkap = '$nama_lengkap',
            nama_panggilan = '$nama_panggilan',
            jenis_kelamin = '$jenis_kelamin',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            usia = '$usia',
            pekerjaan = '$pekerjaan',
            pendidikan = '$pendidikan',
            alamat = '$alamat',
            no_whatsapp = '$no_whatsapp',
            id_status = '$status',
            password = '$password',
            id_kelas = '$kelas' WHERE id_jamaah=$id";
        $hasil = mysqli_query($koneksi,$insert);
        if($hasil){
            echo "<SCRIPT> alert('Perubahan Data Berhasil');window.location='data_jamaah.php'</SCRIPT>";
          }
          else {
                  echo 'gagal';
              }
    }
?>
                