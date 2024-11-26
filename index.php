<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "pt_bendicar";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $identitas = $_POST['identitas'];

    $sql = "INSERT INTO penyewa (Nama, Alamat, No_Telepon, Identitas) 
            VALUES ('$nama', '$alamat', '$no_telepon', '$identitas')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Penyewa</title>
</head>
<body>

    <h1>Tambah Penyewa</h1>

    <form action="index.php" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required></textarea><br><br>

        <label for="no_telepon">No Telepon:</label><br>
        <input type="text" id="no_telepon" name="no_telepon" required><br><br>

        <label for="identitas">Identitas:</label><br>
        <input type="text" id="identitas" name="identitas" required><br><br>

        <input type="submit" value="Tambah Penyewa">
    </form>

    <hr>

    <h2>Daftar Penyewa</h2>

    <?php
    $sql = "SELECT * FROM penyewa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID Penyewa</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Identitas</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ID_Penyewa']}</td>
                    <td>{$row['Nama']}</td>
                    <td>{$row['Alamat']}</td>
                    <td>{$row['No_Telepon']}</td>
                    <td>{$row['Identitas']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data penyewa.";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
