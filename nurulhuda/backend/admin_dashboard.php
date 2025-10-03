<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
</head>
<body>
  <h2>Selamat datang, <?php echo $_SESSION['admin']; ?>!</h2>
  <nav>
    <a href="admin_berita.php">Kelola Berita</a> |
    <a href="admin_pendaftar.php">Lihat Pendaftar</a> |
    <a href="logout.php">Logout</a>
  </nav>
</body>
</html>
