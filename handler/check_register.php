<?php
session_start();
include "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$foto = $_FILES["photo"]["name"];
$tmp_foto = $_FILES["photo"]["tmp_name"];

$query_check = "SELECT * FROM data_user WHERE username = '$username'";
$result_check = $mydb->query($query_check);
if ($result_check->num_rows > 0) {
    header("Location: ../register.php?pesan=terdaftar");
    exit; 
}

move_uploaded_file($tmp_foto, "../assets/uploads/users/" . $foto);

$querySet = "INSERT INTO data_user SET username = '$username', password = '$password', gambar = '$foto'";
$result = mysqli_query($mydb, $querySet);
if ($result) {
    header("Location: ../login.php?pesan=berhasilRegister");
} else {
    die("Error: " . mysqli_error($mydb));
}
