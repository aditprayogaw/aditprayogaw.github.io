<?php
include 'db.php';
if (isset($_GET['idk'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_matakuliah WHERE matakuliah_id = '" . $_GET['idk'] . "'
");
    echo '<script>window.location="../pages/matakuliah.php"</script>';
}
if (isset($_GET['idp'])) {
    $tugas = mysqli_query($conn, "SELECT tugas_image FROM tb_tugas WHERE tugas_id = '" . $_GET['idp'] . "' ");
    $p = mysqli_fetch_object($tugas);
    unlink('../assignment/' . $p->tugas_image);
    $delete = mysqli_query(
        $conn,
        "DELETE FROM tb_tugas WHERE tugas_id = '" . $_GET['idp'] . "'
    "
    );
    echo '<script>window.location="../pages/tugas.php"</script>';
}
