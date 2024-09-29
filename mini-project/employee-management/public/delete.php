<?php
// Memasukkan file konfigurasi database
require_once '../config/database.php';

// Mengambil ID karyawan dari URL
$id = $_GET['id'];

// Query untuk menghapus data karyawan berdasarkan ID
$sql = "DELETE FROM employees WHERE id = :id";
// Mempersiapkan statement
$stmt = $pdo->prepare($sql);
// Menjalankan statement untuk menghapus karyawan
$stmt->execute(['id' => $id]);

// Redirect ke halaman index setelah sukses
header("Location: index.php");
