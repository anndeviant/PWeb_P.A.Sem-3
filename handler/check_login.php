<?php
session_start();

include "connection.php";

//Ambil data form
$username = $_GET["username"];
$password = $_GET["password"];

//Check kondisi database dengan form
$login_proses = mysqli_query($mydb, "SELECT * from data_user where username = '$username' AND password = '$password'") or die(mysqli_error($mydb));

$check = mysqli_num_rows($login_proses);
if ($check > 0) {
    $dataLogin = mysqli_fetch_assoc($login_proses);

    $_SESSION["userData"] = $dataLogin;
    $_SESSION["status"] = "Login Berhasil!";
    header("location: ../rumah.php");
} else if (empty($_GET["username"]) && empty($password = $_GET["password"])) {
    header("Location: ../login.php?pesan=belum_login");
    exit;
} else {
    header("location: ../login.php?pesan=gagal");
}
