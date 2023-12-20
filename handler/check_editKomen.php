<?php
session_start();

if (isset($_GET['id'])) {
    $id_komen = $_GET['id'];
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $select_query = "SELECT * FROM komentar WHERE id_komentar = '$id_komen'";
    $result = $koneksi->query($select_query);

    $check = mysqli_num_rows($result);

    if ($check > 0) {
        $dataLogin = mysqli_fetch_assoc($result);

        $_SESSION["data_komentar"] = $dataLogin;
        $_SESSION["status"] = "Login Berhasil!";
        header("location: ../routes/about.php?pesan=editBerhasil");
    } else {
        die('Error: ' . $select_query . '<br>' . $koneksi->error);
    }
} else {
    die("ID tidak didapatkan!");
}
