<?php

require 'check_guru.php';
require 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM cat_tipesoal WHERE id = $id";

    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notif'] = "Berhasil menghapus data";
        $_SESSION['notif_type'] = "success";
    } else {
        $_SESSION['notif'] = "Gagal menghapus data";
        $_SESSION['notif_type'] = "danger";
    }

    echo json_encode(
        [
            "status" => true,
            "message" => $_SESSION['notif'],
        ]
    );
}
