<?php session_start(); include 'koneksi.php'; 
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
   header("Location: dashboard.php");
   exit();
}

$id_penyewa = $_GET['id'];
$query = "DELETE FROM penyewa WHERE ID_Penyewa='$id_penyewa'";
mysqli_query($koneksi, $query);
header("Location: datapenyewa.php");
?>