<?php
include '../koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM kelas");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Kelas Almaas.xls");

?>

                               <!--Data Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable" width="100%" cellspacing="0" border='1px'>
                                        <thead class="bg-success">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Nama Program</th>
                                                    <!-- <th>Edit</th> -->
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
                                                    <!-- <td>
                                                        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="form_edit_kelas.php?id_kelas=<?=$baris['id_kelas']?>"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p>
                                                    </td> -->
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                <!--===================================================-->
                                <!--End Data Table-->