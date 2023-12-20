<?php
session_start();

if (isset($_GET['id'])) {
    $id_komen = $_GET['id'];
    $isi_komen = $_POST['komentarBaru'];

    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $update_query = "UPDATE komentar SET isi_komentar = '$isi_komen', tanggal = current_timestamp() WHERE id_komentar = '$id_komen'";
    $result = $koneksi->query($update_query);

    if ($result === TRUE) {
        $_SESSION["status"] = "Update Berhasil!";
        header("location: ../routes/about.php?pesan=updateBerhasil");
    } else {
        die('Error: ' . $update_query . '<br>' . $koneksi->error);
    }
} else {
    die("ID tidak didapatkan!");
}
