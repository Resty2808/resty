<?php 
include 'koneksi.php';

if (isset($_POST['login'])) {
    $u = $_POST['u'];
    $p = $_POST['p'];

    // Ubah $conn jadi $koneksi di bawah ini
    $q = mysqli_query($koneksi, "SELECT * FROM users WHERE username_email='$u' AND password='$p'");
    
    if (mysqli_num_rows($q) > 0) {
        session_start();
        $data = mysqli_fetch_assoc($q);
        $_SESSION['username'] = $data['username_email'];
        $_SESSION['level'] = $data['level'];

        echo "<script>alert('Login Berhasil!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Username atau Password Salah!'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo_futsal.jpeg" type="image/jpeg">
    <title>Login - My Courses</title>
    <style>
body {
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url('futsal_2.jpg') center/cover no-repeat fixed;
    min-height:100vh;
    display:flex; justify-content:center; align-items:center;
}

.box {
    background: white;
    padding: 30px;
    border-radius: 20px;
    border: 3px solid #F1C40F; /* Garis kuning */
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    text-align: center;
    width: 320px;
}

.logo {
    width: 90px;  /* Ini yang bikin logo gak gede banget */
    height: 90px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
    border: 2px solid #F1C40F;
}

h2 {
    color: #D4AC0D;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #F1C40F;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 12px;
    background: #F1C40F;
    border: none;
    border-radius: 8px;
    color: #452C1E;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background: #D4AC0D;
}
    </style>
</head>
<body>
    <div class="box">
        <img src="logo_futsal.jpeg" alt="Logo" class="logo" width="80">

        <h2>WELCOME BACK</h2>
        
        <form method="POST">
            <input type="text" name="u" placeholder="Username" required>
            <input type="password" name="p" placeholder="Password" required>
            <button type="submit" name="login">MASUK</button>
        </form>
        
        <p style="font-size:13px; color:#666; margin-top: 20px;">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </p>
    </div>
</body>
</html>