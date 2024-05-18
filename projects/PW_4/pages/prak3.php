<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<h2>Operasi pada PHP</h2>";
        $a="6";
        $b="2.5";
        $komentar="Selamat Datang";

    echo ("Nilai variabel A adalah = $a <br>");

    //variabel bertipe integer
    echo ("Nilai variabel B adalah = $b <br>");

    //variabel bertipe real
    echo ("Nilai variabel komentar adalah = $komentar<br>");

    //variabel bertipe string
    $tambah= $a + $b;

    //rumus pengurangan
    $kurang = $a - $b;

    //rumus perkalian
    $kali = $a * $b;

    //rumus pembagian
    $bagi = $a / $b;

    echo ("Hasil penjumlahan A dan B adalah = $tambah <br>");
    echo ("Hasil pengurangan A dan B adalah = $kurang<br>");
    echo ("Hasil perkalian A dan B adalah = $kali <br>");
    echo ("Hasil pembagian A dan B adalah = $bagi <br>");
    
    $nama = "INSTITUT BISNIS DAN TEKNOLOGI INDONESIA";
    $garis= "=====================================";
    echo "<p>";
    echo $garis."<br>";
    echo $komentar. " di kampus ". $nama. "<br>Selamat Belajar
    Pemrograman Web <br>";
    echo $garis."<br>";
    
    ?>
</body>
</html>