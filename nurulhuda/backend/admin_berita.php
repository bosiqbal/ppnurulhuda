<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    mysqli_query($koneksi, "INSERT INTO berita (judul, isi, tanggal) VALUES ('$judul','$isi',NOW())");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM berita WHERE id=$id");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kelola Berita</title>
</head>
<body>
  <h2>Kelola Berita</h2>
  <form method="POST">
    <input type="text" name="judul" placeholder="Judul Berita" required><br>
    <textarea name="isi" placeholder="Isi berita" required></textarea><br>
    <button type="submit" name="tambah">Tambah Berita</button>
  </form>

  <h3>Daftar Berita</h3>
  <table border="1" cellpadding="5">
    <tr><th>ID</th><th>Judul</th><th>Tanggal</th><th>Aksi</th></tr>
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['judul']."</td>
                <td>".$row['tanggal']."</td>
                <td><a href='?hapus=".$row['id']."' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a></td>
              </tr>";
    }
    ?>
  </table>
</body>
</html>
