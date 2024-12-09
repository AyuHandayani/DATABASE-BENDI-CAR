<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role']; // Peran pengguna, misalnya 'admin' atau 'user'
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PT. Bendi Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>PT. Bendi Car</h1>
        </div>
        <div class="user-info">
            <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>
    
    <div class="dashboard-container">
        <div class="menu">
            <h3>Menu</h3>
            <a href="formulirpenyewaan.html">Penyewaan Mobil</a>
            <?php if ($role == 'admin'): ?>
                <a href="datapenyewa.php">Data Penyewa</a>
                <a href="tambah_data.php">Tambah Data Penyewa</a>
            <?php endif; ?>
        </div>

        <div class="content">
            <h2>Selamat Datang di Dashboard</h2>
            <?php if ($role == 'admin'): ?>
                <p>Anda adalah Admin. Anda dapat mengelola data penyewa dan melakukan perubahan data.</p>
            <?php else: ?>
                <p>Anda adalah Pengguna. Silakan lakukan penyewaan mobil melalui menu yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 PT. Bendi Car. All rights reserved.</p>
    </footer>
</body>
</html>
