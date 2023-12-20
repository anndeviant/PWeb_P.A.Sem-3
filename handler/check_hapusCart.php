<?php
session_start();

include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kueri = "DELETE FROM keranjang WHERE id_produk = '$id'";
    $query = mysqli_query($mydb, $kueri);

    if ($query) {
        header("Location: ../routes/cart.php?pesan=hapus");
    } else {
        echo "Hapus buku gagal";
    }
} else {
    echo "ID not set in POST data.";
}
