<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $user = $_POST['username'];
    $nama = $_POST['nama'];
    $jk   = $_POST['jk'];
    $kls  = $_POST['kelas'];
    $jr   = $_POST['jurusan'];

    $query = mysqli_query($conn, "INSERT INTO users (username_email, Nama, jenis_kelamin, kelas, jurusan) 
              VALUES ('$user', '$nama', '$jk', '$kls', '$jr')");

    if ($query) {
        echo "<script>
                alert('Data Berhasil Ditambah!');
                window.location='index.php'; 
              </script>";
    } else {
        echo "<script>alert('Gagal nambah data');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Tambah User Baru</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; padding: 50px; }
        .card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 400px; }
        h2 { text-align: center; color: #333; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn { background: #e6a43b; color: black; border: none; width: 100%; padding: 12px; border-radius: 5px; font-weight: bold; cursor: pointer; }
        .back { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah User</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <select name="jk">
           <option value="Laki-laki">Laki-laki</option>
           <option value="Perempuan">Perempuan</option>
        </select>
        <input type="text" name="kelas" placeholder="Kelas" required>
        <input type="text" name="jurusan" placeholder="Jurusan" required>
        
        <button type="submit" name="simpan" class="btn">Simpan Data</button>
        <a href="index.php" class="back">Kembali</a>
    </form>
</div>

</body>
</html>