<?php
include 'koneksi.php'; // Pastikan koneksi database benar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Data Penyewa</h1>
    </header>
    <main>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID_Penyewa</th>
                    <th>Nama</th>
                    <th>Identitas</th>
                    <th>Alamat</th>
                    <th>No_Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query data
                $query = "SELECT * FROM penyewa";
                $result = mysqli_query($koneksi, $query);

                // Validasi hasil query
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['ID_Penyewa'] . "</td>";
                            echo "<td>" . $row['Nama'] . "</td>";
                            echo "<td>"   .$row['Identitas'] ."</td>";
                            echo "<td>" . $row['Alamat'] . "</td>";
                            echo "<td>" . $row['No_Telepon'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Belum ada data penyewa.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Query gagal: " . mysqli_error($koneksi) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 PT. Bendi Car</p>
    </footer>
</body>
</html>