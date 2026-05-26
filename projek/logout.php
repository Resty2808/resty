<?php 
session_start();
session_destroy(); // Hapus semua data login
header("location:login.php"); // Balik ke halaman login
?>