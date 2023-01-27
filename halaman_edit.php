<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login.php");
}
$id = $_SESSION['id_jamaah'];
// $query="SELECT * FROM user WHERE id_user = '$id_user' ";
// $hasil=mysqli_query($koneksi,$query);

// $no_induk = $_GET['no_induk'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$data = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pendaftaran | Ngaji</title>
    <link rel="icon" href="assets/img/LOGO.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="style/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="style/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="style/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style/css/main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">

                <div class="card" style="margin-top: 50px">
                    <div class="header">
                        <img src="assets/img/atas.png">
                    </div>
                    <div class="card-content">
                        <form method="post" action="">
                            <input type="hidden" name="id_jamaah" value="<?= $data['id_jamaah'] ?>">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Data Jamaah</b></legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." required autofocus value="<?= $data['nama_lengkap'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Panggilan</label>
                                            <input type="text" class="form-control" name="nama_panggilan" placeholder="Masukan Nama Panggilan..." required autofocus value="<?= $data['nama_panggilan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tempat lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir..." required autofocus value="<?= $data['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan" >Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Usia</label>
                                            <input type="text" class="form-control" name="usia" placeholder="Masukan Usia..." required autofocus value="<?= $data['usia'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pekerjaan</label>
                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan..." required autofocus value="<?= $data['pekerjaan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" name="pendidikan" placeholder="Masukan Pendidikan Terakhir..." required autofocus value="<?= $data['pendidikan'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Rumah..." required autofocus value="<?= $data['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">No WhatsApp</label>
                                            <input type="text" class="form-control" name="no_whatsapp" placeholder="Masukan No WhatsApp..." required autofocus value="<?= $data['no_whatsapp'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="edit" class="btn btn-success pull-right">Edit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php
if (isset($_POST['edit'])){
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
    $qry = "UPDATE `jamaah` SET 
    `nama_lengkap` = '$nama_lengkap', 
    `nama_panggilan` = '$nama_panggilan', 
    `jenis_kelamin` = '$jenis_kelamin',
    `tempat_lahir` = '$tempat_lahir', 
    `tanggal_lahir` = '$tanggal_lahir', 
    `usia` = '$usia', 
    `alamat` = '$alamat', 
    `pendidikan` = '$pendidikan', 
    `pekerjaan` = '$pekerjaan', 
    `no_whatsapp` = '$no_whatsapp' WHERE id_jamaah=$id";
    $hasil = mysqli_query ($koneksi,$qry);

    if($hasil){
        echo "<SCRIPT> alert('Perubahan Data Sukses');window.location='profil_user.php'</SCRIPT>";
    } else {
        echo 'gagal';}
    }

?>