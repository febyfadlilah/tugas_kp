<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:logout.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
try {
    $nilai = mysqli_query($koneksi, "select * from nilai where id_jamaah = '$id_jamaah' ");
  } catch (\Throwable $th) {
    echo "<SCRIPT>alert('Presensi gagal di dapatkan');window.location='./index.php'</SCRIPT>";
    return;
  }
require('./componen/header_user.php');
?>

<div class="container px-4 py-2">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </ul>
            </div>
        </div>
    </nav>

    <!-- isi -->
    <?php
    $query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
    $hasil=mysqli_query($koneksi,$query);
    $hasill = mysqli_fetch_assoc($hasil);
    $kelas = $hasill['id_kelas'];

    $cek_ev = mysqli_query($koneksi,"SELECT * FROM `evaluasi` WHERE status='open' ORDER BY id_evaluasi DESC LIMIT 1");
    $hasil_cek = mysqli_fetch_assoc($cek_ev);
    
    // $ev = mysqli_query($koneksi,"select * from evaluasi_user where id_jamaah = '$id_jamaah' and id_kelas = '$kelas'");
    // $hasil_ev = mysqli_fetch_assoc($ev);
    if(empty($hasil_cek)){
        echo'';
    }else{
        $id_evaluasi = $hasil_cek['id_evaluasi'];
        $ev = mysqli_query($koneksi,"select * from evaluasi_user where id_jamaah = '$id_jamaah' and id_kelas = '$kelas' and id_evaluasi = '$id_evaluasi'");
        $hasil_ev = mysqli_fetch_assoc($ev);
        if(empty($hasil_ev)){
            echo'
            <section style="background-image : url(assets/img/bg_tanpa_kop.jpg) ;">
            <div class="container px-4 py-5">
                <div class="row py-5">
                        <form class="col-md-9 m-auto" method="post" role="form">
                                <div class="form-group col-md-12 mb-3">
                                        <label for="inputname" class="text-white">Kritik</label>
                                        <input type="text" class="form-control mt-1" id="name" name="kritik" placeholder="Kritik">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="inputemail" class="text-white">Saran</label>
                                        <input type="text" class="form-control mt-1" id="email" name="saran" placeholder="Saran">
                                    </div>
                                <div class="col text-end mt-2">
                                    <button type="submit" name="submit" class="btn btn-outline-light btn-lg px-3">Kumpulkan</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </section>
            ';
            if (isset($_POST['submit'])){
                $kritik = $_POST["kritik"];
                $saran = $_POST["saran"];
                $insert = "INSERT into evaluasi_user VALUES(NULL,'$kritik','$saran','$id_jamaah','$kelas','$id_evaluasi')";
                $hasil = mysqli_query($koneksi,$insert);
                if($hasil){
                    echo "<SCRIPT>alert('Evaluasi Berhasil ditambahkan');window.location='nilai_user.php'</SCRIPT>";
                  }
                  else {
                          echo 'gagal';
                      }
            }
        } else {
        ?>
                    
            <table>
                    <?php //mengolah hasil query
                    while ($baris=mysqli_fetch_assoc($hasil)) {
                    ?>
                <tr>
                    <td><b>Nama</td>
                    <td></td>
                    <td>:</td>
                    <td><b><?php echo $baris['nama_lengkap']?></td>
                </tr>
                <tr>
                    <td><b>Tempat, Tanggal Lahir</td>
                    <td></td>
                    <td>:</td>
                    <td><b><?php echo $baris['tempat_lahir'].", ".$baris['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td><b>Alamat</td>
                    <td></td>
                    <td>:</td>
                    <td><b><?php echo $baris['alamat']?></td>
                </tr>
                <br>
                <?php }?>
            </table>
            <table class='table table-success table-striped text-center'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style='padding:0px;''>Aspek Penilaian</th>
                            <th>KKM</th>
                            <th>Nilai</th>
                        </tr> 
                    </thead>
                <?php
                    $no = 0;
                    foreach ($nilai as $p) {
                    $aspek = $p['aspek_penilaian'];
                    $pel = $p['kkm'];
                    $nilai = $p['nilai_total'];
                    $no++;
                    echo "
                    <tbody>
                        <tr>
                        <td>$no</td>
                            <td>$aspek</td>
                            <td>$pel</td>
                            <td>$nilai</td>
                        </tr>
                    ";
                    } 
                    ?>        
                </tbody>      
                </tbody>
            </table>
            <center><a href='cetak_nilai_user.php' target='_BLANK'><button class='text-center btn btn-success'>Cetak</button></a></center>
            <br>
        
        <?php
        }
        
    }
    ?>
    </div>
    
    <!-- <table>
            <?php //mengolah hasil query
            while ($baris=mysqli_fetch_assoc($hasil)) {
            ?>
        <tr>
            <td><b>Nama</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['nama_lengkap']?></td>
        </tr>
        <tr>
            <td><b>Tempat, Tanggal Lahir</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['tempat_lahir'].", ".$baris['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <td><b>Alamat</td>
            <td></td>
            <td>:</td>
            <td><b><?php echo $baris['alamat']?></td>
        </tr>
        <br>
        <?php }?>
    </table>
    <table class='table table-success table-striped text-center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th style='padding:0px;''>Aspek Penilaian</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                </tr> 
            </thead>
        <?php
            $no = 0;
            foreach ($nilai as $p) {
            $aspek = $p['aspek_penilaian'];
            $pel = $p['kkm'];
            $nilai = $p['nilai_total'];
            $no++;
            echo "
            <tbody>
                <tr>
                <td>$no</td>
                    <td>$aspek</td>
                    <td>$pel</td>
                    <td>$nilai</td>
                </tr>
            ";
            } 
            ?>        
        </tbody>      
        </tbody>
    </table>
    <center><a href='cetak_nilai_user.php' target='_BLANK'><button class='text-center btn btn-success'>Cetak</button></a></center>
    <br>
</div> -->

<?php
require('./componen/footer_user.php');
?>