<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Pendaftar</title>
</head>
<body>
  <h2>Data Pendaftar</h2>
  <table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nama</th><th>Email</th><th>No HP</th><th>Jurusan</th><th>Tanggal Daftar</th></tr>
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY tanggal DESC");
    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['email']."</td>
                <td>".$row['no_hp']."</td>
                <td>".$row['jurusan']."</td>
                <td>".$row['tanggal']."</td>
              </tr>";
    }
    ?>
  </table>
</body>
</html>
