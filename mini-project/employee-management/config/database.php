<?php
// Konfigurasi pengaturan database
$host = 'localhost';  // Alamat host database
$dbname = 'tutorialphp';  // Nama database
$username = 'root';  // Nama pengguna database
$password = '';  // Kata sandi pengguna database

try {
    // Membuat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Mengatur mode error untuk menangkap exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menangkap dan menampilkan pesan kesalahan jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
