<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PT. Bendi Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dashboard PT. Bendi Car</h1>
    </header>
    <div class="dashboard-container">
        <!-- Menu Samping -->
        <div class="menu">
            <h3>Menu</h3>
            <a href="formulirpenyewaan.html">Penyewaan Mobil</a>
            <a href="datapenyewa.php">Data Penyewa</a>
            <a href="logout.php">Logout</a>
        </div>
        <!-- Konten Utama -->
        <div class="content">
            <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Gunakan menu di sebelah kiri untuk navigasi.</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 PT. Bendi Car. All rights reserved.</p>
    </footer>
</body>
</html>