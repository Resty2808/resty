<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) { // Sesuaikan dengan nama tombol di form kamu
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jk       = $_POST['jenis_kelamin'];
    $kelas    = $_POST['kelas'];
    $jurusan  = $_POST['jurusan'];

    // TAMBAHKAN 'user' di bagian akhir Query ini
    $sql = "INSERT INTO users (Nama, username_email, password, jenis_kelamin, kelas, jurusan, level) 
            VALUES ('$nama', '$username', '$password', '$jk', '$kelas', '$jurusan', 'user')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login.php';</script>";
    } else {
        echo "Gagal daftar: " . mysqli_error($koneksi);
    }
}
?>