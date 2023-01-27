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
                                    <h3 class="panel-title">Data Jamaah</h3>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <center>
                                        <img src="../foto/<?= $data['foto']?>" class="ukuran">
                                    </center>
                                    <br>
                                    <table class="table table-success table-striped">
                                        <tbody>
                                            <tr>
                                                <th>No. Induk</th>
                                                <td><?php echo $data['no_induk']?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <td><?php echo $data['nama_lengkap']?></td>
                                            </tr>    
                                            <tr>
                                                <th>Nama Panggilan</th>
                                                <td><?php echo $data['nama_panggilan']?></td>
                                            </tr>  
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td><?php echo $data['tempat_lahir']?></td>
                                            </tr>   
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?php echo $data['tanggal_lahir']?></td>
                                            </tr> 
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td><?php echo $data['jenis_kelamin']?></td>
                                            </tr> 
                                            <tr>
                                                <th>Usia</th>
                                                <td><?php echo $data['usia']?></td>
                                            </tr>   
                                            <tr>
                                                <th>Alamat Rumah</th>
                                                <td><?php echo $data['alamat']?></td>
                                            </tr>    
                                            <tr>
                                                <th>Pendidikan Terakhir</th>
                                                <td><?php echo $data['pendidikan']?></td>
                                            </tr>  
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td><?php echo $data['pekerjaan']?></td>
                                            </tr>   
                                            <tr>
                                                <th>No. WhatsApp</th>
                                                <td><?php echo $data['no_whatsapp']?></td>
                                            </tr>     
                                            <?php
                                            $sta = $data['id_status'];
                                            $stat = mysqli_query($koneksi, "SELECT * FROM status where id_status='$sta'");
                                            $status=mysqli_fetch_assoc($stat);
                                            ?>
                                            <tr>
                                                <th>
                                                    Status 
                                                </th>
                                                <td><?php echo $status['nama_status']?></td>
                                            </tr>
                                            <?php
                                            $kls = $data['id_kelas'];
                                            $class = mysqli_query($koneksi, "SELECT * FROM kelas where id_kelas='$kls'");
                                            $kelas=mysqli_fetch_assoc($class);
                                            ?>
                                            <tr>
                                                <th>Kelas</th>
                                                <td><?php echo $kelas['nama_kelas'] ?></td>
                                            </tr>        
                                            <?php
                                            $prg = $data['id_program'];
                                            $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                            $program=mysqli_fetch_assoc($pro);
                                            ?>
                                            <tr>
                                                <th>Program</th>
                                                <td><?php echo $program['nama_program'] ?></td>   
                                            </tr>
                                                               
                                        </tbody>
                                    </table>
                                    <center>
                                        <img src="../kk/<?= $data['kk']?>" class="ukuran2">
                                    </center>
                                    <br>
                                    <center>
                                        <img src="../ktp/<?= $data['ktp']?>" class="ukuran2">
                                    </center>
                                <!--===================================================-->
                                <!--End Data Table-->
                                    </div>
                                    <br>
                                    <a href="cetak_show.php?id_jamaah=<?=$data['id_jamaah']?>">
                                        <center>
                                            <button class="btn btn-success">Cetak</button>
                                        </center>
                                    </a>
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
                