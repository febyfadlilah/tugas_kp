<?php
include 'koneksi.php';
session_start();
if($_SESSION['no_induk']==""){
    header("location:login.php");
}
$id_jamaah = $_SESSION['id_jamaah'];
$query="SELECT * FROM jamaah WHERE id_jamaah = '$id_jamaah' ";
$hasil=mysqli_query($koneksi,$query);

require('./componen/header_user.php');
?>
    <!-- Start Banner Hero -->
    <section class="container py-2">
    
        <div class="py-2">
        <table class="table table-success table-striped">
            <tbody>
            <?php //mengolah hasil query
            while ($baris=mysqli_fetch_assoc($hasil)) {
            ?>
                <tr>
                    <div class="text-center">
                        <img src="foto/<?php echo $baris['foto'];?>" class="img-thumbnail" alt="Cinque Terre" width="300" height="300">
                    <!-- <img src="assets/img/LOGO.png" class="" alt="100"> -->
                    </div>
                </tr><br>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            </ul>
                            <form class="d-flex">
                                <div class="row">
                                    <div class="text-left">
                                        <a class="btn btn-success" href="halaman_edit.php">Edit Data</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $baris['nama_lengkap']?></td>
                </tr>    
                <tr>
                    <td>Nama Panggilan</td>
                    <td><?php echo $baris['nama_panggilan']?></td>
                </tr>  
                <tr>
                    <td>Tempat Lahir</td>
                    <td><?php echo $baris['tempat_lahir']?></td>
                </tr>   
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo $baris['tanggal_lahir']?></td>
                </tr> 
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $baris['jenis_kelamin']?></td>
                </tr> 
                <tr>
                    <td>Usia</td>
                    <td><?php echo $baris['usia']?></td>
                </tr>   
                <tr>
                    <td>Alamat Rumah</td>
                    <td><?php echo $baris['alamat']?></td>
                </tr>    
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td><?php echo $baris['pendidikan']?></td>
                </tr>  
                <tr>
                    <td>Pekerjaan</td>
                    <td><?php echo $baris['pekerjaan']?></td>
                </tr>   
                <tr>
                    <td>No. WhatsApp</td>
                    <td><?php echo $baris['no_whatsapp']?></td>
                </tr>
                <?php } ?>                
            </tbody>
        </table>
</div>
</div>
    </section>
    <!-- End Banner Hero -->

<?php
require('./componen/footer_user.php');
?>