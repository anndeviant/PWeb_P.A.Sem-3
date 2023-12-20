<?php
session_start();
include "connection.php";

if (isset($_SESSION["userData"])) {
    $user_data = $_SESSION['userData'];
    $usernameOri = $user_data['username'];
} else if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];
    $usernameOri = $user_data['username'];
}

$username = $_POST["username"];
$emailUser = $_POST["email"];
$noHp = $_POST["telephone"];
$alamat = $_POST["address"];
$password = $_POST["password"];


if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
    $foto = $_FILES["photo"]["name"];
    $tmp_foto = $_FILES["photo"]["tmp_name"];

    move_uploaded_file($tmp_foto, "../assets/uploads/users/" . $foto);
}

$queryUpdate = "update data_user set email = '$emailUser', no_hp = '$noHp', alamat_user = '$alamat'";

if (!empty($password)) {
    $queryUpdate .= ", password = '$password'";
}

if (!empty($username)) {
    $queryUpdate .= ", username = '$username'";
}

if (isset($foto)) {
    $queryUpdate .= ", gambar = '$foto'";
}

$queryUpdate .= " WHERE username = '$usernameOri'";

$resultUpdate = mysqli_query($mydb, $queryUpdate);

if (!$resultUpdate) {
    die("Error: " . mysqli_error($mydb));
}

$check = mysqli_affected_rows($mydb);

if ($check > 0) {
    $selectQuery = "SELECT * FROM data_user WHERE username = '$username'";
    $resultSelect = mysqli_query($mydb, $selectQuery);

    if (!$resultSelect) {
        die("Error: " . mysqli_error($mydb));
    }

    $dataLogin = mysqli_fetch_assoc($resultSelect);

    $_SESSION["userUpdate"] = $dataLogin;
    $_SESSION["status"] = "Update Successful!";

    header("Location: ../routes/profile.php?pesan=berhasilUpdate");
} else {
    header("Location: ../routes/profile.php?pesan=notUpdated");
}
