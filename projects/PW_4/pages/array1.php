<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $kelompok1 =
    array("Andi","Budi","Chika","David","Erna"); echo "Nama Mahasiswa
    Kelompok 1 :<br />";
    for ($i=0; $i<=4; $i++) {
        echo " - ",$kelompok1[$i],"<br/>";
    }
    echo"<br /><br />";
    $kelompok2[] = "Fera";
    $kelompok2[] = "Gani";
    $kelompok2[] = "Hery";
    $kelompok2[] = "Intan";
    $kelompok2[] = "Jaka";
    echo "Nama Mahasiswa Kelompok 2 :<br />";
    for ($i=0; $i<=4; $i++){
        echo " - ",$kelompok2[$i],"<br/>";
    }
    ?>
</body>
</html>