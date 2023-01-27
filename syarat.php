<?php
session_start();
$nl = $_SESSION['nama_lengkap'];
$np = $_SESSION['nama_panggilan'];
$jk = $_SESSION['jenis_kelamin']; 
$t = $_SESSION['tempat_lahir'] ;
$tl = $_SESSION['tanggal_lahir'];
$age = $_SESSION['usia'];
$work = $_SESSION['pekerjaan'];
$edu = $_SESSION['pendidikan'];
$almt = $_SESSION['alamat'];
$wa = $_SESSION['no_whatsapp'];
$pro = $_SESSION['program'];
?>
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

                        <h3>Berikut adalah syarat pendaftaran jamaah baru yang harus dipenuhi :</h3>
                        <ol>
                            <li>
                                Mengisi Formulir Pendaftaran
                            </li>
                            <li>Menyerahkan dan mengupload dokument berupa : </li>
                                <ol>
                                    <li>Fotocopy KTP 1 lembar</li>
                                    <li>Fotocopy KK 1 lembar</li>
                                    <li>Pas foto background biru ukuran 3x4 1 lembar</li>
                                    <li>soft file foto (jpg/jpeg)</li>
                                </ol>
                            <li>Membayar biaya pendaftaran sebesar Rp. 150.000</li>
                            <li>Infaq per periode (3 bulan)</li>
                                <ol>
                                    <li>Rp. 300.000</li>
                                    <li>Rp. 400.000</li>
                                    <li>Lainnya.................</li>
                                    <label>Pilih salah satu infaq terbaikmu</label>
                                </ol>
                            <li>Infaq periode dibayar diawal pendaftaran atau boleh dibayar 2x pembayaran</li>
                            <li>Pembayaran bisa tunai (datang ke kantor) atau transfer ke rekening BCA 1014433433 a.n. Antok Koesharjanto (direktur ALMAAS)</li>
                        </ol>
                        <h6><i><b>*Catatan : Segeralah melengkapi persyaratan setelah anda melakukan pendaftaran!</b></i></h6>
                        <a href="index.php"><button type="submit" name="submit" class="btn btn-success pull-left">Close</button>
                        <a href="pendaftaran_jamaah.php"><button type="submit" name="daftar" class="btn btn-success pull-right">Lanjut Pendaftaran<i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>