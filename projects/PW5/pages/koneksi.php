<!-- Membuka Koneksi ke Server MySQL -->
<?php
$host = "localhost";
$user = "root"; // sesuai dengan username database anda
$pass = "1234"; //sesuaikan dengan password database anda
$connect = mysqli_connect($host, $user, $pass);
//check koneksi
if ($connect) {
    echo "Koneksi database Berhasil";
} else {
    echo "Koneksi database GAGAL";
}
?>