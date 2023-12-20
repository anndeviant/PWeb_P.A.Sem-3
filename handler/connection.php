<?php
$server = "localhost";
$username = "root";
$password = "";
$namadb = "project_akhir_web";

$mydb = new mysqli($server, $username, $password, $namadb);

if ($mydb->connect_error) {
    die("<br> Error: " . $mydb->connect_error);
}
