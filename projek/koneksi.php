<?php
$koneksi = mysqli_connect("localhost", "root", "", "2526_30db");
if (!$koneksi) {
    die("Gagal konek: " . mysqli_connect_error());
}
?>