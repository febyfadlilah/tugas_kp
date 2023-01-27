<?php
session_start();
include "../koneksi.php";
$role = $_SESSION['role'];
if($_SESSION['role'] != "1"){
    header("location:../logout.php"); 
}
$id_aktor = $_SESSION['id_aktor'];
// $hasil = mysqli_query($koneksi,"select * from jamaah as j inner join kelas_jadwal as k on j.id_jamaah = k.id_jamaah inner join jadwal as jad on k.id_jadwal = jad.id_jadwal");
$hasil = mysqli_query($koneksi, "SELECT * FROM kelas");
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
                            <!-- <a target="_blank" href="cetak_data_jamaah.php"><button name="excel">Export Excel</button></a>
                            <a target="_blank" href="cetak_data_jamaah_pdf.php"><button name="excel">Export PDF</button></a> -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Kelas</h3>
                                </div>
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                            <a target="_blank" href="cetak_data_kelas.php" class="btn btn-success model3" name="excel">Export Excel</a>
                                        </ul>
                                        <form class="model2 d-flex" method="post">
                                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll mt-2" style="--bs-scroll-height: 100px;">
                                                <li class="model">
                                                <?php
                                                    $selBar=mysqli_query($koneksi, "SELECT * FROM program ORDER BY id_program ");        
                                                    echo '<select name="program" class="form-control" required value="$data["id_program"]">';
                                                    echo '<option>Pilih Program</option>';
                                                    while ($rowbar = mysqli_fetch_array($selBar)) {  
                                                    echo '<option value="'.$rowbar['id_program'].'">'.$rowbar['nama_program'].'</option>';    
                                                    }    
                                                    echo '</select>';
                                                    ?>
                                                </li>
                                                <!-- <li class="model"><input class="form-control" name="key" type="search" placeholder="Nama or Induk" aria-label="Search"></li> -->
                                                <li class="model"><button class="btn btn-success" name="submit" type="submit">Search</button></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $key = $_POST['program'];
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM kelas where id_program = '$key'");
                                    } else {
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM kelas");
                                    }
                                    ?>
                                </div>
                                <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Nama Program</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 0;
                                                while ($baris=mysqli_fetch_assoc($hasil)) {
                                                    $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $baris['nama_kelas']?></td>
                                                    <?php
                                                    $prg = $baris['id_program'];
                                                    $pro = mysqli_query($koneksi, "SELECT * FROM program where id_program='$prg'");
                                                    $program=mysqli_fetch_assoc($pro);
                                                    ?>
                                                    <td><?php echo $program['nama_program'] ?></td>
                                                    <td>
                                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="form_edit_kelas.php?id_kelas=<?=$baris['id_kelas']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="hapus_kelas.php?id_kelas=<?=$baris['id_kelas']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-trash"></span></button></a></p>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->
                                    </div>
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