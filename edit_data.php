<?php session_start(); include 'koneksi.php'; 
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
   header("Location: dashboard.php");
   exit();
}

$id_penyewa = $_GET['id'];
$query = "SELECT * FROM penyewa WHERE ID_Penyewa='$id_penyewa'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama = $_POST['nama'];
   $identitas = $_POST['identitas'];
   $alamat = $_POST['alamat'];
   $no_telepon = $_POST['no_telepon'];

   $update_query = "UPDATE penyewa SET Nama='$nama', Identitas='$identitas', Alamat='$alamat', No_Telepon='$no_telepon' WHERE ID_Penyewa='$id_penyewa'";
   mysqli_query($koneksi, $update_query);
   header("Location: datapenyewa.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Data Penyewa - PT. Bendi Car</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Edit Data Penyewa - <?php echo htmlspecialchars($data['Nama']); ?></h1>

<form method="POST" action="">
   <input type="text" name="nama" value="<?php echo htmlspecialchars($data['Nama']); ?>" required />
   <input type="text" name="identitas" value="<?php echo htmlspecialchars($data['Identitas']); ?>" required />
   <input type="text" name="alamat" value="<?php echo htmlspecialchars($data['Alamat']); ?>" required />
   <input type="text" name="no_telepon" value="<?php echo htmlspecialchars($data['No_Telepon']); ?>" required />
   <button type="submit">Update Data</button>
</form>

<a class='btn-back' href='datapenyewa.php'>Kembali ke Data Penyewa</a>

<footer><p>&copy; 2024 PT. Bendi Car.</p></footer>

</body></html>