<?php

session_start();

// $harga = $_POST["pembayaran"];
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
    $jumlahProduk = $_POST['jumlahProduk'];
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $insert_query = "INSERT INTO histori (id_user, id_produk, jumlah_produk) VALUES ('$id_user', '$product_id', '$jumlahProduk')";

    if ($koneksi->query($insert_query) === TRUE) {
        $_SESSION["id_user"] = $id_user;
        $_SESSION["id_produk"] = $product_id;
        $kueri = "DELETE FROM keranjang WHERE id_produk = '$product_id'";
        $query = mysqli_query($koneksi, $kueri);
        header("Location: ../routes/cart.php?pesan=berhasilBeli");
    } else {
        echo "Error: " . $insert_query . "<br>" . $koneksi->error;
    }
} else {
    die("Gagal mendapatkan id!");
}
