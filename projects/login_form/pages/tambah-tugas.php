<?php
session_start();
include '../script/db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initialscale=1">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="../style/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <img src="https://www.ipmlab-fpunud.com/public/uploads/situs/situs_220604010401_instiki.png" width="200px">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="matakuliah.php">Matakuliah</a></li>
                <li><strong><a href="tugas.php">Tugas</a></strong></li>
                <li><a href="../script/logout.php">| LOGOUT |</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h2>Tambah Data Tugas</h2>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="matakuliah" required>
                        <option value="">--Pilih
                            Matakuliah--</option>
                        <?php
                        $matakuliah = mysqli_query($conn, "SELECT * FROM tb_matakuliah ORDER BY matakuliah_id DESC");
                        while ($r =
                            mysqli_fetch_array($matakuliah)
                        ) {
                        ?>
                            <option value="<?php echo
                                            $r['matakuliah_id']
                                            ?>"><?php echo $r['matakuliah_name']?></option>
                        <?php } ?>
                        </select>
                        <input type="text" name="nama" class="input-control" placeholder="Deskripsi Tugas" required>
                        <input type="text" name="nama_nim" class="input-control" placeholder="Nama (NIM)" required>
                        <input type="file" name="gambar" class="input-control" required>
                        <select class="input-control" name="format">
                            <option value="">--
                                Format Tugas--</option>
                            <option>jpg</option>
                            <option>jpeg</option>
                            <option>png</option>
                            <option>gif</option>
                            <option>pdf</option>
                            <option>docx</option>
                            <option>pptx</option>

                        </select>
                        <br>
                        <select class="input-control" name="status">
                            <option value="">--Pilih Status Tugas--</option>
                            <option value="1">Selesai</option>
                            <option value="0">Belum mengumpulkan</option>
                        </select>
                        <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    // print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $matakuliah = $_POST['matakuliah'];
                    $nama = $_POST['nama'];
                    $nama_nim = $_POST['nama_nim'];
                    $format = $_POST['format'];
                    $status = $_POST['status'];
                    // menampung data fileyang diupload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];
                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];
                    $newname = 'tugas'.time().'.'.$type2;
                    // menampung data format file yang diizinkan
                    $type_diizinkan = array(
                        'jpg', 'jpeg', 'png', 'gif',
                        'pdf', 'docx', 'pptx'
                    );
                    // validasi format file
                    if (!in_array($type2, $type_diizinkan)) {
                        // jika format file tidak ada didalam type diizinkan
                        echo '<script>alert("Format File Tidak Diizinkan")</script>';
                    } else {
                        // jika format file sesuai dengan yang ada didalam
                        array($type_diizinkan);
                        // proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, '../assignment/'.$newname);
                    }
                    
                    $insert = mysqli_query($conn, "INSERT INTO tb_tugas VALUES(0,'".$matakuliah."','".$nama."','".$nama_nim."','".$format."','".$newname."','".$status."', 0)");
                    if ($insert) {
                        echo '<script>alert(Simpan Data Berhasil)</script>';
                        echo '<script>window.location = "tugas.php"</script>';
                    } else {
                        echo 'Gagal' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 INSTITUT BISNIS DAN TEKNOLOGI
                INDONESIA</small>
        </div>
    </footer>
</body>

</html>