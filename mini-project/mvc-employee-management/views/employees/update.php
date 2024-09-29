<?php
// Memasukkan header halaman
include 'views/includes/header.php';

?>

<h1 class="text-2xl mb-4">Edit Karyawan</h1>
<!-- Form untuk mengedit data karyawan -->
<form action="index.php?action=update&id=<?php echo $id ?>" method="POST">
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

<?php include 'views/includes/footer.php'; ?>