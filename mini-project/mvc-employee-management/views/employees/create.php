<?php include 'views/includes/header.php' ?>

<h1 class="text-2xl mb-4">Tambah Karyawan</h1>
<!-- Form untuk menambahkan karyawan baru -->
<form action="index.php?action=store" method="POST">
    <div class="mb-4">
        <label for="name" class="block text-grey-700">Nama : </label>
        <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <div class="mb-4">
        <label for="address" class="block text-grey-700">Alamat : </label>
        <input type="text" name="address" id="address" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <div class="mb-4">
        <label for="salary" class="block text-grey-700">Gaji : </label>
        <input type="text" name="salary" id="salary" class="border rounded w-full py-2 px-3 text-grey-700">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
</form>

<?php include 'views/includes/footer.php' ?>