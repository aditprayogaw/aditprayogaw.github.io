<?php
session_start();
include '../script/db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$tugas = mysqli_query($conn, "SELECT * FROM tb_tugas WHERE tugas_id = '".$_GET['id']."'");
if (mysqli_num_rows($tugas) == 0) {
    echo '<script>window.location="tugas.php"</script>';
}
$p = mysqli_fetch_object($tugas);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
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
            <h2> Edit Data Tugas</h2>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="matakuliah" required>
                        <option value="">--Pilih Matakuliah--
                        </option>
                        <?php
                        $matakuliah = mysqli_query($conn, "SELECT * FROM tb_matakuliah ORDER BY matakuliah_id DESC");
                        while ($r =
                            mysqli_fetch_array($matakuliah)
                        ) {
                        ?>
                            <option value="<?php echo $r['matakuliah_id'] ?>" <?php echo (
                                                                                    $r['matakuliah_id'] == $p->matakuliah_id) ? 'selected' : ''; ?>><?php echo
                                                                $r['matakuliah_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Deskripsi Tugas" value="<?php echo $p->tugas_name ?>" required>
                    <input type="text" name="nama_nim" class="input-control" placeholder="Nama (NIM)" value="<?php echo $p->nama_nim ?>" required>
                    <img src="tugas/<?php echo $p->tugas_image ?>" width="100px">
                    <input type="hidden" name="file" value="<?php echo $p->tugas_image ?>">
                    <input type="file" name="gambar" class="input-control">
                    <select class="input-control" name="format">
                        <option value="">--Format File--
                        </option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>jpg</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>jpeg</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>png</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>gif</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>pdf</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>docx</option>
                        <option <?php echo ($p->tugas_format) ? 'selected' : ''; ?>>pptx</option>
                    </select>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--
                        </option>
                        <option value="1" <?php echo ($p->tugas_status == 1) ? 'selected' : '';
                                            ?>>Selesai</option>
                        <option value="0" <?php echo ($p->tugas_status == 0) ? 'selected' : '';
                                            ?>>Belum Mengumpulkan</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    // data inputan dari form
                    $matakuliah = $_POST['matakuliah'];
                    $tugas = $_POST['nama'];
                    $nama_nim = $_POST['nama_nim'];
                    $format = $_POST['format'];
                    $status = $_POST['status'];
                    $file = $_POST['file'];
                    // data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name =
                        $_FILES['gambar']['tmp_name'];
                    // jika admin ganti gambar
                    if ($filename != '') {
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'tugas' . time() . '.' . $type2;
                        // menampung data format file yang diizinkan
                        $type_diizinkan = array(
                            'jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx',
                            'pptx'
                        );
                        // validasi format file
                        if (!in_array($type2, $type_diizinkan)) {
                            // jika format file tidak ada didalam type diizinkan
                            echo '<script>alert("Format File Tidak Diizinkan")</script>';
                        } else {
                            unlink('./tugas/' . $file);
                            move_uploaded_file($tmp_name, './tugas/' . $newname);
                            $nama_gambar = $newname;
                        }
                    } else {
                        // jika admin tidak ganti gambar
                        $nama_gambar = $file;
                    }
                    // jika admin tidak ganti gambar
                    $update = mysqli_query($conn, "UPDATE
                        tb_tugas SET
                        matakuliah_id= '" . $matakuliah . "',
                        tugas_name= '" . $tugas . "',
                        nama_nim= '" . $nama_nim . "',
                        tugas_format= '" . $format . "',
                        tugas_image= '" . $nama_gambar . "',
                        tugas_status= '" . $status . "'
                        WHERE tugas_id = '" . $p->tugas_id . "' ");
                                            if ($update) {
                        echo '<script>alert(Ubah Data Berhasil)</script>';
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
            <small>Copyright &copy; 2021 - INSTITUT BISNIS DAN
                TEKNOLOGI INDONESIA</small>
        </div>
    </footer>
</body>

</html>