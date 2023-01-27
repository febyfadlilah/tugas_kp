<?php
include('../koneksi.php');
session_start();
if($_SESSION['role']!="2"){
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
                                    <h3 class="panel-title">Form Input Data Jamaah</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <form class="row" method="post" enctype="multipart/form-data" action="">
                                    <div class="col-md-6">
                                        <label class="form-label">No Induk</label>
                                        <input type="text" name="no_induk" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_lengkap">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Nama Panggilan</label>
                                        <input type="text" class="form-control" name="nama_panggilan">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat lahir">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="-">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-Laki">Laki-laki</option>
                                            <option value="Perempuan" >Perempuan</option>
                                        </select>
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Usia</label>
                                        <input type="text" class="form-control" name="usia">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" name="pekerjaan">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Pendidikan terakhir</label>
                                        <input type="text" class="form-control" name="pendidikan">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">No. WhatsApp</label>
                                        <input type="text" class="form-control" name="no_whatsapp">
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
                                        <div class="col-md-6">
                                        <label class="form-label">KTP</label>
                                        <input type="file" class="form-control" name="ktp">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">KK</label>
                                        <input type="file" class="form-control" name="kk">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                        </div>
                                        <div class="col-md-6">
                                        <label class="form-label">Kelas</label>
                                        <!-- <input type="text" class="form-control" value=""> -->
                                        <?php
                                        $kls=mysqli_query($koneksi, "SELECT * from kelas ORDER BY id_kelas");        
                                        echo '<select name="kelas" class="form-control" required>';
                                        echo '<option>- Pilih Kelas -</option>';
                                        while ($kelas = mysqli_fetch_array($kls)) {     
                                        echo '
                                        <option value="'.$kelas['id_kelas'].'">'.$kelas['nama_kelas'].'</option>';    
                                        }    
                                        echo '</select>';
                                        ?>
                                        </div>
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-12">
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
?>
<?php
// include 'koneksi.php';
if (isset($_POST['submit'])){
    $no_induk = $_POST["no_induk"];
  $password = $_POST["password"];
  $status = $_POST["status"];
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
  $program = $_POST['program'];
  $kelas = $_POST['kelas'];
  $pengajar = $_POST['pengajar'];
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";
  // ambil data file
  $foto = $_FILES['foto']['name'];
  $fotosementara = $_FILES['foto']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "foto/";

  // pindahkan file
  $terupload = move_uploaded_file($fotosementara, $dirUpload.$foto);

  $kk = $_FILES['kk']['name'];
  $kksementara = $_FILES['kk']['tmp_name'];

  // tentukan lokasi file  akan dipindahkan
  $dirUploads = "kk/";

  // pindahkan file
  $ss = move_uploaded_file($kksementara, $dirUploads.$kk);

  $ktp = $_FILES['ktp']['name'];
  $ktpsementara = $_FILES['ktp']['tmp_name'];

  // tentukan lokasi file akan dipindahkan
  $dirUploadss = "ktp/";

  // pindahkan file
  $sss = move_uploaded_file($ktpsementara, $dirUploadss.$ktp);

  $qry = "INSERT INTO `jamaah` (`id_jamaah`, `no_induk`, `password`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `alamat`, `pendidikan`, `pekerjaan`, `no_whatsapp`, `foto`, `kk`, `ktp`, `bukti_pembayaran`, `status_pembayaran`, `id_status`, `id_kelas`, `id_program`) VALUES (NULL, '$no_induk', '$password', '$nama_lengkap', '$nama_panggilan', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$usia', '$alamat', '$pendidikan', '$pekerjaan', '$no_whatsapp', '$foto', '$kk', '$ktp', '', 'diterima', '$status', '$kelas', '$program')";
//   $hasil = mysqli_query ($koneksi,$qry);

  $data = mysqli_query($koneksi, "select * from jamaah where no_induk='$no_induk' ");
    $cek = mysqli_fetch_array($data);
    if (empty($cek)){
        $hasil = mysqli_query ($koneksi,$qry);
        if($hasil){
            echo "<SCRIPT>window.location='jamaah.php'</SCRIPT>";

        }else {
            echo 'gagal';
        }
    } else {
        echo "<SCRIPT>alert('No Induk Tidak Boleh Sama');window.location='jamaah.php'</SCRIPT>";
    }
}
?>
            