<?php
$host = "localhost";
$user = "root"; // sesuai dengan username database anda
$pass = "1234"; //sesuaikan dengan password database anda
$db = "tutorial"; //sesuaikan dengan nama database anda
$connect = mysqli_connect($host, $user, $pass);
//check koneksi
if ($connect) {
    //memilih database
    $select = mysqli_select_db($connect, $db);

    //check apakah database yang anda tuliskan ada atau tidak di dalam server mysql
    if ($check) {
        //echo "Berhasil menemukan database ".$db;
    } else {
        echo "Database " . $db . "tidak ditemukan";
    }
} else {
    echo "Koneksi database GAGAL";
}
//membuat query
$query = mysqli_query($connect, "SELECT * FROM table_siswa");
// anda harus mempunyai table dengan nama table_siswa dalam database
$data = mysqli_fetch_array($query);
$kolom1 = $data[0];
$kolom2 = $data[1];
$kolom3 = $data[2];
$kolom4 = $data[3];
echo $kolom1 . "" . $kolom2 . "" . $kolom3 . "" . $kolom4;

