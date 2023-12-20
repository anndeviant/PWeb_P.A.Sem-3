<?php
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $select_query = "SELECT * FROM produk WHERE id_produk = '$product_id'";
    $result = $koneksi->query($select_query);

    $check = mysqli_num_rows($result);

    if ($check > 0) {
        $dataLogin = mysqli_fetch_assoc($result);

        $_SESSION["data_produk"] = $dataLogin;
        $_SESSION["status"] = "Login Berhasil!";
        header("location: ../routes/product.php?pesan=buying");
    } else {
        die('Error: ' . $select_query . '<br>' . $koneksi->error);
    }
} else {
    die("ID tidak didapatkan!");
}
