<?php 
include 'koneksi.php';

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data lama dari database (Ganti $conn jadi $koneksi)
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_array($query);

// 3. Proses Update data jika tombol simpan diklik
if (isset($_POST['update'])) {
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jk       = $_POST['jenis_kelamin'];
    $kelas    = $_POST['kelas'];
    $jurusan  = $_POST['jurusan'];

    $update = mysqli_query($koneksi, "UPDATE users SET 
                Nama='$nama', 
                username_email='$username', 
                password='$password', 
                jenis_kelamin='$jk', 
                kelas='$kelas', 
                jurusan='$jurusan' 
                WHERE id='$id'");

    if ($update) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Edit Data User</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f1d382; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 15px; width: 450px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #f39c12; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; margin-top: 10px; }
        .back { display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none; }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit User</h2>
    <form method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= $data['Nama']; ?>" required>

        <label>Username</label>
        <input type="text" name="username" value="<?= $data['username_email']; ?>" required>

        <label>Password</label>
        <input type="password" name="password" value="<?= $data['password']; ?>" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki" <?= ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
        </select>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= $data['kelas']; ?>" required>

        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="TJKT" <?= ($data['jurusan'] == 'TJKT') ? 'selected' : ''; ?>>Teknik Jaringan Komputer dan Telekomunikasi</option>
            <option value="TKI" <?= ($data['jurusan'] == 'TKI') ? 'selected' : ''; ?>>Teknik Kimia Industri</option>
            <option value="Kecantikan dan Spa" <?= ($data['jurusan'] == 'Kecantikan dan Spa') ? 'selected' : ''; ?>>Kecantikan dan Spa</option>
            <option value="Desain Busana" <?= ($data['jurusan'] == 'Desain Busana') ? 'selected' : ''; ?>>Desain Busana</option>
            <option value="Kuliner" <?= ($data['jurusan'] == 'Kuliner') ? 'selected' : ''; ?>>Kuliner</option>
        </select>

        <button type="submit" name="update">Update Data</button>
    </form>
    <a href="index.php" class="back">Batal</a>
</div>

</body>
</html>