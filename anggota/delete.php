<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM t_anggota WHERE f_id=$id";

    if ($db->runSQL($sql)) {
        // jika tindakan berhasil
        echo "<script>alert('Data berhasil dihapus'); window.location.assign('?f=anggota&m=select');</script>";
    } else {
        // jika tindakan gagal
        echo "<script>alert('Data gagal dihapus'); window.location.assign('?f=anggota&m=select');</script>";
    }
}


