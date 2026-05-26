<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Daftar Member Futsal</title>
    <style>
        body {
            background: linear-gradient(135deg, #FEF9E7 0%, #F9E79F 100%);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #B7950B;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #452C1E;
            font-weight: bold;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box; /* Biar gak luber */
            font-family: inherit;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #F1C40F;
            box-shadow: 0 0 5px rgba(241, 196, 15, 0.5);
        }

        .btn-daftar {
            background-color: #D4AC0D;
            color: white;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-daftar:hover {
            background-color: #B7950B;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: #D4AC0D;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Form Pendaftaran</h2>
    <form action="proses_register.php" method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>

        <label>Username / Email</label>
        <input type="text" name="username" placeholder="Masukkan username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Buat password" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Kelas</label>
        <input type="text" name="kelas" placeholder="Contoh: XI TJKT 4" required>

        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan Telekomunikasi</option>
            <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
            <option value="Kecantikan dan Spa">Kecantikan dan Spa</option>
            <option value="Desain Produksi Busana">Desain Produksi Busana</option>
            <option value="Kuliner">Kuliner</option>
        </select>

        <button type="submit" name="daftar" class="btn-daftar">Daftar Sekarang</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="login.php">Login di sini</a>
    </div>
</div>

</body>
</html>