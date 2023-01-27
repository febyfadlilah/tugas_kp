<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pendaftaran | Ngaji</title>
    <link rel="icon" href="assets/img/LOGO.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="style/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="style/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body>
<center>
    <div class="container-center">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                <div class="card" style="margin-top: 50px">
                    <div class="header">
                        <img src="assets/img/atas.png">
                    </div>
                    <div class="card-content">
                        <form method="post" action="" enctype="multipart/form-data">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Data Calon Jamaah</b></legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." required autofocus value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Panggilan</label>
                                            <input type="text" class="form-control" name="nama_panggilan" placeholder="Masukan Nama Panggilan..." required autofocus value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Rumah..." required autofocus value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tempat lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir..." required autofocus value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="" disabled selected>- Pilih Jenis Kelamin -</option>

                                                <option value="Laki-Laki">Laki-laki</option>
                                                <option value="Perempuan" >Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Usia</label>
                                            <input type="number" class="form-control" name="usia" placeholder="Masukan Usia..." required autofocus value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pekerjaan</label>
                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan..." required autofocus value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" name="pendidikan" placeholder="Masukan Pendidikan Terakhir..." required autofocus value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">No WhatsApp</label>
                                            <input type="text" class="form-control" name="no_whatsapp" placeholder="Masukan No WhatsApp..." required autofocus value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Program</label>
                                        <?php
                                        include 'koneksi.php';
                                            $selBar=mysqli_query($koneksi, "SELECT * FROM program ORDER BY id_program ");        
                                            echo '<select name="program" class="form-control" required>';
                                            '<option selected>Pilih Program Pilihan</option>';
                                            while ($rowbar = mysqli_fetch_array($selBar)) {    
                                            echo '<option value="'.$rowbar['id_program'].'">'.$rowbar['nama_program'].'</option>';    
                                            }    
                                            echo '</select>';
                                        ?>
                                            <!-- <select name="program" class="form-control">
                                                <option value="" disabled selected>-- Pilih Program Pilihan --</option>
                                                <option value="bimbingan ngaji privat">Bimbingan Ngaji Privat</option>
                                                <option value="bimbingan tahfidz">Bimbingan Tahfidz</option>
                                                <option value="ngaji online">Ngaji Online</option>
                                            </select> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <div class="form-group label-floating"> -->
                                                <p class="text-left" style="margin:0px;"><label class="control-label">Upload Foto Background Biru</label></p>
                                            <!-- </div> -->
                                            <input class="form-control" type="file" id="formFile" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <div class="form-group label-floating"> -->
                                                <p class="text-left" style="margin:0px;"><label class="control-label">Upload Kartu Keluarga</label></p>
                                            <!-- </div> -->
                                            <input class="form-control" type="file" id="formFile" name="kk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <div class="form-group label-floating"> -->
                                                <p class="text-left" style="margin:0px;"><label class="control-label">Upload KTP</label></p>
                                            <!-- </div> -->
                                            <input class="form-control" type="file" id="formFile" name="ktp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <div class="form-group label-floating"> -->
                                                <p class="text-left" style="margin:0px;"><label class="control-label">Upload Bukti Pembayaran</label></p>
                                            <!-- </div> -->
                                            <input class="form-control" type="file" id="formFile" name="daftar">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success pull-right">Daftar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</center>
</body>

</html>
<?php
include 'koneksi.php';
if (isset($_POST['submit'])){
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
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    // ambil data file
    $foto = $_FILES['foto']['name'];
    $fotosementara = $_FILES['foto']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "foto/";

    // pindahkan file
    $terupload = move_uploaded_file($fotosementara, $dirUpload.$foto);

    $kk = $_FILES['kk']['name'];
    $kksementara = $_FILES['kk']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUploads = "kk/";

    // pindahkan file
    $ss = move_uploaded_file($kksementara, $dirUploads.$kk);

    $ktp = $_FILES['ktp']['name'];
    $ktpsementara = $_FILES['ktp']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUploadss = "ktp/";

    // pindahkan file
    $sss = move_uploaded_file($ktpsementara, $dirUploadss.$ktp);

    $daftar = $_FILES['daftar']['name'];
    $daftarsementara = $_FILES['daftar']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUploadsss = "bukti/";

    // pindahkan file
    $ssss = move_uploaded_file($daftarsementara, $dirUploadsss.$daftar);

    $qry = "INSERT INTO `jamaah` (`id_jamaah`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `no_induk`, `tempat_lahir`, `tanggal_lahir`, `usia`, `alamat`, `pendidikan`, `pekerjaan`, `no_whatsapp`, `password`, id_program, foto, kk, ktp, bukti_pembayaran) VALUES (NULL, '$nama_lengkap', '$nama_panggilan', '$jenis_kelamin', '', '$tempat_lahir', '$tanggal_lahir', '$usia', '$alamat', '$pendidikan', '$pekerjaan', '$no_whatsapp', '','$program','$foto', '$kk', '$ktp', '$daftar')";
    $hasil = mysqli_query ($koneksi,$qry);

    if($hasil){
        echo "<SCRIPT>window.location='syarat_jamaah.php'</SCRIPT>";
    } else {
        echo 'gagal';}
    }
?>