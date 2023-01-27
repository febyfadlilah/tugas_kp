<?php
$servername = "localhost";
$database = "kpfix_bismillah (2)";
$username = "root";
$password="";
$koneksi = mysqli_connect($servername, $username, $password, $database);
if (!$koneksi) {
    die ("Maaf koneksi anda gagal : ". mysqli_connect_error());
}
?>