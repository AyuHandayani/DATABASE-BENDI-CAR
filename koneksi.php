<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pt_bendicar";

$koneksi = mysqli_connect($host, $username, $password, $dbname);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>