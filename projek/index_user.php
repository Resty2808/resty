<?php 
session_start();
include 'koneksi.php'; 

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

$result = mysqli_query($koneksi, "SELECT * FROM users"); 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Data User Futsal</title>
    <style>
       body {
            background: linear-gradient(135deg, #FEF9E7 0%, #F9E79F 100%);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 95%;
            max-width: 1100px;
            margin: 50px auto;
            position: relative;
        }
        h2 { color: #B7950B; margin-top: 0; }
        .status-user {
            background: #D4AC0D;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
        }
        .logout {
            float: right;
            color: #E74C3C;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid #E74C3C;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        th { background-color: #F1C40F; color: #452C1E; padding: 15px; border-bottom: 3px solid #D4AC0D; }
        td { padding: 12px; border-bottom: 1px solid #eee; text-align: center; }
        tr:nth-child(even) { background-color: #FFF9E3 !important; }
        tr:nth-child(odd) { background-color: #ffffff !important; }
        .btn-tambah {
            background-color: #D4AC0D;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
        }
        .btn-edit, .btn-hapus {
            padding: 6px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            color: white;
            display: inline-block;
        }
        .btn-edit { background-color: #F1C40F; color: #452C1E; margin-right: 5px; }
        .btn-hapus { background-color: #E74C3C; }
    </style>
</head>
<body>

<div class="container">
    <a href="logout.php" class="logout" onclick="return confirm('Yakin mau keluar?')">Logout</a>
    <h2>Daftar Member Futsal</h2>
    
    <div class="status-user">
        Login Sebagai: <?= strtoupper($_SESSION['level']); ?> (<?= $_SESSION['username']; ?>)
    </div>
    <br>

    <?php if($_SESSION['level'] == "admin") : ?>
        <a href="register.php" class="btn-tambah">+ Tambah User</a>
    <?php endif; ?>

    <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>L/P</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <?php if($_SESSION['level'] == "admin") : ?>
            <th>Aksi</th>
            <?php endif; ?>
        </tr>
        <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($result)) { 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['username_email']; ?></td>
            <td><?= $row['Nama']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <?php if($_SESSION['level'] == "admin") : ?>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>