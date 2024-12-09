<?php session_start(); include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa - PT. Bendi Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>Data Penyewa</h1></header>

<main>

<table class="data-table">
<thead>
<tr><th>No</th><th>ID_Penyewa</th><th>Nama</th><th>Identitas</th><th>Alamat</th><th>No_Telepon</th><?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?><th>Aksi</th><?php endif; ?></tr></thead>

<tbody>

<?php
$query = "SELECT * FROM penyewa";
$result = mysqli_query($koneksi, $query);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['ID_Penyewa']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Identitas']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['No_Telepon']) . "</td>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo "<td> <a href='edit_data.php?id=".$row['ID_Penyewa']."'>Edit</a> | 
                      <a href='delete_data.php?id=".$row['ID_Penyewa']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Delete</a></td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Belum ada data penyewa.</td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>Query gagal: " . mysqli_error($koneksi) . "</td></tr>";
}
?>

</tbody></table>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
<?php endif; ?>

</main>

<footer><p>&copy; 2024 PT. Bendi Car.</p></footer>
<a class='btn-back' href='tambah_data.php'>Tambah Penyewa</a>
</body>
</html>