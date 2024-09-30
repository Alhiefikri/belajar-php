<?php
require_once 'models/employee.php';  // Mengimpor file model Employee untuk digunakan dalam controller

class EmployeeController
{
    // Fungsi ini menampilkan semua karyawan
    public function index()
    {
        // Mengambil semua data karyawan dengan menggunakan fungsi 'all' dari class Employee
        $employees = Employee::all();

        // Mengarahkan ke tampilan 'index.php' untuk menampilkan daftar karyawan
        include 'views/employees/index.php';
    }

    // Fungsi ini menampilkan form untuk menambahkan karyawan baru
    public function create()
    {
        // Mengarahkan ke tampilan 'create.php' yang berisi form untuk menambahkan karyawan
        include 'views/employees/create.php';
    }

    // Fungsi ini menyimpan data karyawan baru ke dalam database
    public function save()
    {
        // Mengambil data dari form yang di-post oleh pengguna
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];

        // Memanggil fungsi 'create' dari class Employee untuk menyimpan data baru ke database
        Employee::create($name, $address, $salary);

        // Mengarahkan pengguna kembali ke halaman index setelah data disimpan
        header("Location: index.php");
    }

    // Fungsi ini menampilkan form edit berdasarkan id karyawan
    public function edit($id)
    {
        // Mengambil data karyawan berdasarkan id menggunakan fungsi 'find'
        $employee = Employee::find($id);

        // Mengarahkan ke tampilan 'update.php' untuk mengedit data karyawan
        include 'views/employees/update.php';
    }

    // Fungsi ini mengupdate data karyawan yang sudah ada di database
    public function update($id)
    {
        // Mengambil data baru dari form yang di-post oleh pengguna
        $name = $_POST['name'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];

        // Memanggil fungsi 'update' dari class Employee untuk mengupdate data karyawan
        Employee::update($id, $name, $address, $salary);

        // Mengarahkan pengguna kembali ke halaman index setelah data diupdate
        header("Location: index.php");
    }

    // Fungsi ini menghapus data karyawan berdasarkan id
    public function delete($id)
    {
        // Memanggil fungsi 'delete' dari class Employee untuk menghapus karyawan berdasarkan id
        Employee::delete($id);

        // Mengarahkan pengguna kembali ke halaman index setelah data dihapus
        header("Location: index.php");
    }
}


?>

<!--  -->