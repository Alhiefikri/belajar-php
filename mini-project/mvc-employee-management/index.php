<?php
require_once 'config/database.php';  // Mengimpor konfigurasi database agar bisa digunakan di seluruh aplikasi
require_once 'controllers/employeeController.php';  // Mengimpor EmployeeController untuk menangani logika terkait karyawan

// Routing dengan switch case statement
$action = isset($_GET['action']) ? $_GET['action'] : '';  // Memeriksa apakah ada parameter 'action' dalam URL, jika tidak ada maka kosongkan

$controller = new EmployeeController();  // Membuat instance dari EmployeeController untuk menangani tindakan berdasarkan routing

switch ($action) {
    case 'create':
        // Jika action adalah 'create', tampilkan form untuk menambahkan karyawan baru
        $controller->create();
        break;
    case 'store':
        // Jika action adalah 'store', simpan data karyawan baru ke database
        $controller->save();
        break;
    case 'update':
        // Jika action adalah 'update', perbarui data karyawan dengan ID tertentu
        $controller->update($_GET['id']);
        break;
    case 'edit':
        // Jika action adalah 'edit', tampilkan form untuk mengedit karyawan dengan ID tertentu
        $controller->edit($_GET['id']);
        break;
    case 'delete':
        // Jika action adalah 'delete', hapus karyawan dengan ID tertentu dari database
        $controller->delete($_GET['id']);
        break;
    default:
        // Jika action tidak ada atau tidak dikenali, tampilkan daftar karyawan
        $controller->index();
        break;
}


?>
<!--  -->