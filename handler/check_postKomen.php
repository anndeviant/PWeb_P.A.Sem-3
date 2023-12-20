<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

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
    $id = $_GET['id'];
    $komentar = $_POST['komentar'];

    $insert_query = "INSERT INTO komentar (id_user, isi_komentar) VALUES ('$id', '$komentar')";

    if ($koneksi->query($insert_query) === TRUE) {
        $_SESSION["id_user"] = $id_user;
        $_SESSION["id_produk"] = $product_id;
        header("Location: ../routes/about.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . $koneksi->error;
    }
} else {
    die("Gagal mendapatkan id!");
}
