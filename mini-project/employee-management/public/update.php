<?php
// Memasukkan file konfigurasi database
require_once '../config/database.php';
// Memasukkan header halaman
include '../include/header.php';

// Mengambil ID karyawan dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data karyawan berdasarkan ID
$sql = "SELECT * FROM employees WHERE id = :id";
// Mempersiapkan statement
$stmt = $pdo->prepare($sql);
// Menjalankan statement dengan ID karyawan
$stmt->execute(['id' => $id]);
// Mengambil data karyawan sebagai array asosiatif
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

// Mengecek apakah metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang diupdate dari form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    // Query untuk memperbarui data karyawan
    $sql = "UPDATE employees SET name = :name, address = :address, salary = :salary WHERE id = :id";
    // Mempersiapkan statement
    $stmt = $pdo->prepare($sql);
    // Menjalankan statement dengan data yang diambil dari form
    $stmt->execute([
        'name' => $name,
        'address' => $address,
        'salary' => $salary,
        'id' => $id
    ]);
    // Redirect ke halaman index setelah sukses
    header("Location: index.php");
}

?>

<h1 class="text-2xl mb-4">Edit Karyawan</h1>
<!-- Form untuk mengedit data karyawan -->
<form action="update.php?id=<?php echo $id ?>" method="POST">
    <div class="mb-4">
        <label for="name" class="block text-grey-700">Nama : </label>
        <!-- Mengisi field dengan nama karyawan saat ini -->
        <input value="<?= $employee['name'] ?>" type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <div class="mb-4">
        <label for="address" class="block text-grey-700">Alamat : </label>
        <!-- Mengisi field dengan alamat karyawan saat ini -->
        <input value="<?= $employee['address'] ?>" type="text" name="address" id="address" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <div class="mb-4">
        <label for="salary" class="block text-grey-700">Gaji : </label>
        <!-- Mengisi field dengan gaji karyawan saat ini -->
        <input value="<?= $employee['salary'] ?>" type="text" name="salary" id="salary" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <!-- Tombol untuk mengupdate data karyawan -->
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
</form>

<?php include '../include/footer.php'; ?>