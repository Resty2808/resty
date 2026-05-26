<?php
$koneksi = mysqli_connect("localhost", "2526_30", "12345678", "2526_30db");
if (!$koneksi) {
    die("Gagal konek: " . mysqli_connect_error());
}
?>