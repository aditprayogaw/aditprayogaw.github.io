<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mahasiswa = array("Lina", "Arni", "Jona", "Punjabi", "Marcus",
    "Marlin");
    echo "<strong>Nama Mahasiswa sebelum diurutkan : </strong><br
    />";
    foreach($mahasiswa as $data => $nama){
        echo "$data: $nama"."<br />";
    }
    sort($mahasiswa);
    echo "<strong>Nama Mahasiswa setelah diurutkan : </strong><br
    />";
    foreach($mahasiswa as $data => $nama){
        echo "$data: $nama"."<br />";
    }

    ?>
</body>
</html>