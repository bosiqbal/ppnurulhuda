<?php
include "koneksi.php";

$nama    = $_POST['nama'];
$email   = $_POST['email'];
$no_hp   = $_POST['no_hp'];
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO pendaftaran (nama, email, no_hp, jurusan) 
          VALUES ('$nama','$email','$no_hp','$jurusan')";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success", "message" => "Pendaftaran berhasil!"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
}
?>
