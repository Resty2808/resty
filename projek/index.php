<?php 
session_start();
include 'koneksi.php'; 

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

$result = mysqli_query($koneksi, "SELECT * FROM users");
$total = mysqli_num_rows($result);
$result_laki = mysqli_query($koneksi, "SELECT * FROM users WHERE jenis_kelamin='Laki-laki'");
$total_laki = mysqli_num_rows($result_laki);
$result_perempuan = mysqli_query($koneksi, "SELECT * FROM users WHERE jenis_kelamin='Perempuan'");
$total_perempuan = mysqli_num_rows($result_perempuan);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Data User Futsal</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: #FFF3B0;
            background-image:
                linear-gradient(rgba(0,0,0,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0,0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .topnav {
            background: #2C2C2C;
            padding: 14px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topnav-brand {
            color: #F4C430;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 1px;
        }
        .topnav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .nav-user { color: #ccc; font-size: 13px; }
        .nav-user strong { color: #F4C430; }
        .nav-badge {
            background: #F4C430;
            color: #2C2C2C;
            font-size: 11px;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 20px;
        }
        .nav-logout {
            background: transparent;
            color: #ff6b6b;
            border: 1px solid #ff6b6b;
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }
        .nav-logout:hover { background: #ff6b6b; color: white; }

        .hero {
            position: relative;
            height: 260px;
            overflow: hidden;
        }
        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(0,0,0,0.78) 0%, rgba(0,0,0,0.25) 100%);
        }
        .hero-text {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 50px;
        }
        .hero-text h1 {
            color: #fff;
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .hero-text h1 span { color: #F4C430; }
        .hero-text p { color: #ddd; font-size: 15px; }

        .stats-wrap {
            display: flex;
            max-width: 900px;
            margin: -36px auto 0 auto;
            position: relative;
            z-index: 10;
            padding: 0 20px;
        }
        .stat-card {
            flex: 1;
            background: #2C2C2C;
            color: white;
            padding: 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .stat-card:first-child { border-radius: 14px 0 0 14px; }
        .stat-card:last-child { border-radius: 0 14px 14px 0; }
        .stat-card + .stat-card { border-left: 1px solid #3a3a3a; }
        .stat-card .num {
            font-size: 36px;
            font-weight: 900;
            color: #F4C430;
            line-height: 1;
        }
        .stat-card .lbl {
            font-size: 12px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .stat-card .bar {
            height: 3px;
            background: #3a3a3a;
            border-radius: 2px;
            margin-top: 10px;
            overflow: hidden;
        }
        .stat-card .bar-fill {
            height: 100%;
            background: #F4C430;
            border-radius: 2px;
        }

        .main {
            max-width: 1100px;
            margin: 30px auto 50px auto;
            padding: 0 20px;
        }
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            overflow-x: auto;
            border: 1px solid #E6D080;
        }
        .card-header {
            background: #2C2C2C;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-header h2 { color: #F4C430; font-size: 20px; font-weight: 800; }
        .btn-tambah {
            background: #F4C430;
            color: #2C2C2C;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            min-width: 750px;
        }
        thead tr { background: #FFF0A0; }
        thead th {
            padding: 14px 20px;
            color: #5C4500;
            font-weight: 700;
            text-align: center;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #E6B800;
            white-space: nowrap;
        }
        tbody td {
            padding: 14px 20px;
            text-align: center;
            color: #333;
            border-bottom: 1px solid #f5f5f5;
            white-space: nowrap;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #FFFDE8; transition: 0.15s; }
        tbody tr:nth-child(even) td { background: #fafafa; }

        .badge-laki {
            background: #EBF5FB;
            color: #1a5276;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid #AED6F1;
            white-space: nowrap;
            display: inline-block;
        }
        .badge-perempuan {
            background: #FDEDEC;
            color: #922b21;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid #F1948A;
            white-space: nowrap;
            display: inline-block;
        }
        .btn-edit {
            background: #FFF0A0;
            color: #5C4500;
            padding: 5px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            margin-right: 4px;
            border: 1px solid #E6B800;
            white-space: nowrap;
        }
        .btn-hapus {
            background: #E74C3C;
            color: white;
            padding: 5px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }
    </style>
</head>
<body>

<div class="topnav">
    <div class="topnav-brand">⚽ FUTSAL MEMBER</div>
    <div class="topnav-right">
        <div class="nav-user">Login sebagai <strong><?= $_SESSION['username']; ?></strong></div>
        <?php if($_SESSION['level'] == 'admin'): ?>
            <span class="nav-badge">👑 ADMIN</span>
        <?php endif; ?>
        <a href="logout.php" class="nav-logout" onclick="return confirm('Yakin mau keluar?')">Logout</a>
    </div>
</div>

<div class="hero">
    <img src="futsal_2.jpg" alt="Futsal Banner">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>Halo, <span><?= $_SESSION['username']; ?>!</span></h1>
        <p>Halo! Yuk cek data tim futsalmu hari ini</p>
    </div>
</div>

<div class="stats-wrap">
    <div class="stat-card">
        <div class="num"><?= $total; ?></div>
        <div class="lbl">Total Member</div>
        <div class="bar"><div class="bar-fill" style="width:100%"></div></div>
    </div>
    <div class="stat-card">
        <div class="num"><?= $total_laki; ?></div>
        <div class="lbl">Laki-laki</div>
        <div class="bar"><div class="bar-fill" style="width:<?= $total > 0 ? round($total_laki/$total*100) : 0 ?>%"></div></div>
    </div>
    <div class="stat-card">
        <div class="num"><?= $total_perempuan; ?></div>
        <div class="lbl">Perempuan</div>
        <div class="bar"><div class="bar-fill" style="width:<?= $total > 0 ? round($total_perempuan/$total*100) : 0 ?>%"></div></div>
    </div>
</div>

<div class="main">
    <div class="card">
        <div class="card-header">
            <h2>⚽ Daftar Member Futsal</h2>
            <?php if($_SESSION['level'] == "admin") : ?>
                <a href="register.php" class="btn-tambah">+ Tambah User</a>
            <?php endif; ?>
        </div>
        <table>
            <thead>
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
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['username_email']; ?></td>
                <td><?= $row['Nama']; ?></td>
                <td>
                    <?php if($row['jenis_kelamin'] == 'Laki-laki'): ?>
                        <span class="badge-laki">♂ Laki-laki</span>
                    <?php else: ?>
                        <span class="badge-perempuan">♀ Perempuan</span>
                    <?php endif; ?>
                </td>
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
            </tbody>
        </table>
    </div>
</div>

</body>
</html>