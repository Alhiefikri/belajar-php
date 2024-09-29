<?php
// Memasukkan header halaman
include 'views/includes/header.php';
?>

<!-- Tombol untuk menambahkan karyawan baru -->
<a href="index.php?action=create" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Karyawan</a>
<table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/3 px-4 py-2">Nama</th>
            <th class="w-1/3 px-4 py-2">Alamat</th>
            <th class="w-1/3 px-4 py-2">Gaji</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>

    <tbody class="text-gray-700">
        <!-- Iterasi melalui setiap karyawan dan tampilkan data mereka -->
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td class="border px-4 py-2">
                    <?= $employee['name'] ?>
                </td>
                <td class="border px-4 py-2">
                    <?= $employee['address'] ?>
                </td>
                <td class="border px-4 py-2">
                    <?= $employee['salary'] ?>
                </td>
                <td class="border px-4 py-2 flex gap-4">
                    <!-- Link untuk mengedit karyawan -->
                    <a class="bg-yellow-500 hover:bg-yellow-800 text-white py-1 px-2 rounded" href="index.php?action=edit&id=<?= $employee['id']  ?>">Edit</a>
                    <!-- Link untuk menghapus karyawan -->
                    <a class="bg-red-500 hover:bg-red-800 text-white py-1 px-2 rounded" href="index.php?action=delete&id=<?= $employee['id']  ?>">Delete</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>

</table>

<!-- Memasukkan footer halaman -->
<?php include 'views/includes/footer.php' ?>