<?php
class Employee
{
    // Fungsi untuk mendapatkan semua data karyawan dari database
    public static function all()
    {
        // Menggunakan variabel $pdo yang ada di luar fungsi ini (global)
        global $pdo;

        // SQL query untuk mengambil semua data dari tabel employees
        $sql = "SELECT * FROM employees";

        // Menjalankan query dan menyimpan hasilnya ke dalam variabel $stmt
        $stmt = $pdo->query($sql);

        // Mengembalikan semua hasil query sebagai array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan data karyawan berdasarkan id
    public static function find($id)
    {
        global $pdo;

        // SQL query untuk mengambil data karyawan berdasarkan id tertentu
        $sql = "SELECT * FROM employees WHERE id = :id";

        // Mempersiapkan query agar bisa diisi dengan parameter (prepared statement)
        $stmt = $pdo->prepare($sql);

        // Menjalankan query dengan mengisi parameter id
        $stmt->execute(['id' => $id]);

        // Mengembalikan satu baris data karyawan sebagai array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk menambahkan karyawan baru ke database
    public static function create($name, $address, $salary)
    {
        global $pdo;

        // SQL query untuk menambahkan karyawan baru ke tabel employees
        $sql = "INSERT INTO employees (name, address, salary) VALUES (:name, :address, :salary)";

        // Mempersiapkan query untuk menambahkan data karyawan
        $stmt = $pdo->prepare($sql);

        // Menjalankan query dengan data yang diberikan
        $stmt->execute(['name' => $name, 'address' => $address, 'salary' => $salary]);
    }

    // Fungsi untuk memperbarui data karyawan berdasarkan id
    public static function update($id, $name, $address, $salary)
    {
        global $pdo;

        // SQL query untuk memperbarui data karyawan di database
        $sql = "UPDATE employees SET name = :name, address = :address, salary = :salary WHERE id =:id";

        // Mempersiapkan query untuk memperbarui data
        $stmt = $pdo->prepare($sql);

        // Menjalankan query dengan data baru yang diberikan
        $stmt->execute(['name' => $name, 'address' => $address, 'salary' => $salary, 'id' => $id]);
    }

    // Fungsi untuk menghapus data karyawan berdasarkan id
    public static function delete($id)
    {
        global $pdo;

        // SQL query untuk menghapus data karyawan berdasarkan id
        $sql = "DELETE FROM employees WHERE id = :id";

        // Mempersiapkan query untuk menghapus data
        $stmt = $pdo->prepare($sql);

        // Menjalankan query dengan id yang diberikan
        $stmt->execute(['id' => $id]);
    }
}
