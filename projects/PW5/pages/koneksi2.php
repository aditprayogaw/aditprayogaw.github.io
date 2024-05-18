<!-- Memilih Database Yang Akan Digunakan Di Server -->
<?php
$host = "localhost";
$user = "root"; // sesuai dengan username database anda
$pass = "1234"; //sesuaikan dengan password database anda
$db = "tutorial"; //sesuaikan dengan nama database anda
$connect = mysqli_connect($host, $user, $pass);
//check koneksi
if($connect){
    //memilih database
    $select = mysqli_select_db($connect, $db,);
    //check apakah database yang anda tuliskan ada atau tidak di dalam server mysql
    if($check){
        echo "Berhasil menemukan database ".$db;
    }
    else{
        echo "Database " .$db. "tidak ditemukan";
    }
}
else{
    echo "Koneksi database GAGAL";
}

?>