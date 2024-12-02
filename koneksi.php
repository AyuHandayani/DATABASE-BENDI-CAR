<?php
$host = "localhost";
$username = "root";
$password = ""; // Biarkan kosong jika menggunakan XAMPP
$dbname = "pt_bendicar"; // Pastikan nama database sesuai

$koneksi = mysqli_connect($host, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>