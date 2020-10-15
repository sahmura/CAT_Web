<?php

// require 'check_peserta.php';
require 'db_connect.php';

$user_id = mysqli_real_escape_string($db, $_POST['idsiswa']);
$kd_judul_tes = mysqli_real_escape_string($db, $_POST['kd_judul_tes']);
$session_id = mysqli_real_escape_string($db, $_POST['session_id']);
$komentar = (isset($_POST['komentar']) || $_POST['komentar'] != '') ? mysqli_real_escape_string($db, $_POST['komentar']) : ' ';

$listAngketId = $_POST['angket_id']; //array
for ($i = 0; $i < count($listAngketId); $i++) {
    $jawaban = mysqli_real_escape_string($db, $_POST['jawaban-' . $listAngketId[$i]]);
    mysqli_query($db, "INSERT INTO cat_hasil_angket(angket_id, user_id, jawaban, session_id, kd_judul_tes) VALUES($listAngketId[$i], $user_id, '$jawaban', '$session_id' ,$kd_judul_tes)");
}

mysqli_query($db, "INSERT INTO cat_komentar(user_id, komentar) VALUES ($user_id, '$komentar')");

header('Location: ../peserta/done.php?idsiswa=' . $user_id . '&idkodesoal=' . $kd_judul_tes . '&sessionid=' . $session_id);
