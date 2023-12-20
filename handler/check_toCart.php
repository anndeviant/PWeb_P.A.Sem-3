<?php
session_start();

if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];
    $id_user = $user_data['id_user'];
} else if (isset($_SESSION['userData'])) {
    $user_data = $_SESSION['userData'];
    $id_user = $user_data['id_user'];
} else {
    header("location: ../login.php?pesan=belum_login");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $insert_query = "INSERT INTO keranjang (id_user, id_produk) VALUES ('$id_user', '$product_id')";

    if ($koneksi->query($insert_query) === TRUE) {
        $_SESSION["id_user"] = $id_user;
        $_SESSION["produk"] = $product_id;
        header("Location: ../routes/product.php?pesan=addCart");
    } else {
        echo "Error: " . $insert_query . "<br>" . $koneksi->error;
    }
} else {
    header("location: ../error_page.php");
    exit();
}
