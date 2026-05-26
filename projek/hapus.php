<?php 
// 1. Panggil koneksi database
include 'koneksi.php';

// 2. Ambil ID yang dikirim dari URL
$id = $_GET['id'];

// 3. Jalankan perintah hapus (Pakai $koneksi ya!)
$query = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");

// 4. Cek apakah berhasil
if($query){
    // Jika berhasil, balik lagi ke halaman index
    echo "<script>alert('Data Berhasil Dihapus!'); window.location='index.php';</script>";
} else {
    // Jika gagal, kasih tahu errornya apa
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>