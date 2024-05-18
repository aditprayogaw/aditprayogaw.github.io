<?php

// $nilai = 70;
// if($nilai >= 90 AND $nilai <= 100){
//     echo "Kamu Lulus";
// } else if($nilai <= 89) {
//     echo "Belajar Lagi Dek";
// } else {
//     echo "Error";
// }

// $hasil = $nilai == 90 ? "Kamu Lulus" : "Belajar Lagi";
// echo $hasil

// for($i=0; $i <= 100; $i++) {
//     if($i >= 90) {
//         echo "$i - " . "Nilai Sangat Bagus" . "<br />";
//     }
//     else if($i >= 80) {
//         echo "$i - " . "Nilai Bagus" . "<br />";
//     } elseif ($i >= 50) {
//         echo "$i - " . "Nilai Kurang" . "<br />";    
//     } else {
//         echo "$i - " . "Belajar jir" . "<br />";
//     }
// }

$i = 0;

while($i <= 100) {
    if($i < 50) {
        echo "$i - Nilai Sangat Kurang <br />";
    } else if($i < 80) {
        echo "$i - " . "Nilai Bagus" . "<br />";
    } else {
        echo "$i - " . "Bagus bgt cok" . "<br />";
    }

    $i = $i+5;
}




?>