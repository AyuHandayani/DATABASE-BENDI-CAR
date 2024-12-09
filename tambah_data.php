<?php session_start(); include 'koneksi.php'; 
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
   header("Location: dashboard.php");
   exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ID_Penyewa = $_POST['ID_Penyewa'];
   $Nama = $_POST['Nama'];
   $Identitas = $_POST['Identitas'];
   $Alamat = $_POST['Alamat'];
   $No_Telepon = $_POST['No_Telepon'];

   // Insert into database
   $query = "INSERT INTO penyewa (ID_Penyewa, Nama, Identitas, Alamat, No_Telepon) VALUES ('$ID_Penyewa','$Nama', '$Identitas', '$Alamat', '$No_Telepon')";
   mysqli_query($koneksi, $query);
   header("Location: datapenyewa.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Data Penyewa - PT. Bendi Car</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Tambah Data Penyewa</h1>

<form method="POST" action="">
    <input type="text" name="ID_Penyewa" placeholder="ID_Penyewa" required />
   <input type="text" name="Nama" placeholder="Nama" required />
   <input type="text" name="Identitas" placeholder="Identitas (KTP/SIM)" required />
   <input type="text" name="Alamat" placeholder="Alamat" required />
   <input type="text" name="No_Telepon" placeholder="No Telepon" required />
   <button type="submit">Simpan Data</button>
</form>

<a class='' href='datapenyewa.php'>Kembali ke Data Penyewa</a>

<footer><p>&copy; 2024 PT. Bendi Car.</p></footer>

</body></html>