<?php

require 'check_guru.php';
require 'db_connect.php';

if (isset($_POST['tombol-edit'])) {

    $id = mysqli_real_escape_string($db, $_POST['kd_soal']);
    $soal = mysqli_real_escape_string($db, $_POST['soal']);
    $kunci = mysqli_real_escape_string($db, $_POST['kunci']);
    $kesulitan = mysqli_real_escape_string($db, $_POST['kesulitan']);
    $tipe = mysqli_real_escape_string($db, $_POST['tipesoal']);
    $kategori = mysqli_real_escape_string($db, $_POST['jenisTes']);

    $sql = "UPDATE cat_soal SET isi_soal = '$soal', kunci_soal = '$kunci', tipe = '$tipe', tingkat_kesulitan = '$kesulitan', kategori = '$kategori' WHERE kd_soal = $id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notif'] = "Data berhasil diedit";
        $_SESSION['notif_type'] = "success";
        header('Location: ../admin/soal.php');
    } else {
        $_SESSION['notif'] = "Data gagal diedit";
        $_SESSION['notif_type'] = "danger";
        header('Location: ../admin/soal.php');
    }
}
