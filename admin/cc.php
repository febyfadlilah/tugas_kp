<?php
include '../koneksi.php';
session_start();
if($_SESSION['role']!="2"){
    header("location:../logout.php");
}
$id_aktor = $_SESSION['id_aktor'];
$id = $_GET['id_jamaah'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_jamaah = $id");
$data = mysqli_fetch_assoc($hasil);
require('componen_admin/header.php');
?>
<?php
    require('componen_admin/footer.php');
    if (isset($_POST['submit'])){
        $no_induk = $_POST["no_induk"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $status = $_POST['status'];
        $password = $_POST['password'];
        $kelas = $_POST['kelas'];
        $status_pembayaran = $_POST['status_pembayaran'];

        $insert = "UPDATE jamaah set 
            no_induk = '$no_induk',
            nama_lengkap = '$nama_lengkap',
            id_status = '$status',
            password = '$password',
            status_pembayaran = '$status_pembayaran',
            id_kelas = '$kelas' WHERE id_jamaah=$id";
        
        $data = mysqli_query($koneksi, "select * from jamaah where no_induk='$no_induk' ");
        $cek = mysqli_fetch_array($data);
        if (empty($cek)){
            $hasil = mysqli_query($koneksi,$insert);
            if($hasil){
                echo "<SCRIPT>window.location='jamaah.php'</SCRIPT>";
                $qry = "INSERT INTO pembayaran VALUES (NULL,Now(),'150.000','Pendaftaran','$id')";
                $proses = mysqli_query($koneksi,$qry);

            }else {
                echo 'gagal';
            }
        } else {
            echo "<SCRIPT>alert('No Induk Tidak Boleh Sama');window.location='konfirmasi_jamaah.php'</SCRIPT>";
        }
    }

?>