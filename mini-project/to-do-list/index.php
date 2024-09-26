<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Meta tag untuk mengatur encoding karakter menjadi UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta tag untuk mengatur tampilan responsif pada berbagai perangkat -->
    <title>To-Do List</title>
    <!-- Title halaman -->
    <link rel="stylesheet" href="style.css">
    <!-- Menghubungkan file CSS eksternal untuk styling halaman -->
</head>

<body>
    <div class="todo-container">
        <h1>To-Do List</h1>
        <!-- Form untuk menambah tugas baru -->
        <form class="todo-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <!-- Input untuk memasukkan tugas baru -->
            <input type="text" name="task" id="task" placeholder="Tambahkan tugas baru . . .">
            <!-- Tombol untuk mengirim tugas -->
            <button type="submit" name="add">Tambah</button>
        </form>

        <?php
        // Memulai session PHP untuk menyimpan data antar halaman
        session_start();

        // Inisialisasi array tasks jika belum ada di session
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = [];
        }

        // Handle penambahan tugas baru
        if (isset($_POST['add'])) {
            // Mengambil input tugas dari form dan membersihkan spasi berlebih
            $task = trim($_POST['task']);
            // Jika input tidak kosong, tambahkan tugas ke dalam array session
            if (!empty($task)) {
                $_SESSION['tasks'][] = $task;
            }
            // Redirect ke halaman yang sama untuk mencegah pengiriman ulang form
            header("location: " . htmlspecialchars($_SERVER['PHP_SELF']));
            exit;
        }

        // Handle penghapusan tugas
        if (isset($_POST['delete'])) {
            // Mengambil indeks tugas yang akan dihapus
            $index_to_delete = intval($_POST['delete']);
            // Memeriksa apakah indeks valid sebelum menghapus tugas
            if (isset($_SESSION['tasks'][$index_to_delete])) {
                unset($_SESSION['tasks'][$index_to_delete]);
                // Mengurutkan ulang array tasks setelah penghapusan
                $_SESSION['tasks'] = array_values($_SESSION['tasks']);
            }
        }
        ?>

        <!-- Menampilkan daftar tugas -->
        <ul class="todo-list">
            <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                <!-- Setiap tugas ditampilkan sebagai item dalam <li> -->
                <li>
                    <!-- Menampilkan tugas dengan sanitasi untuk mencegah XSS -->
                    <?= htmlspecialchars($task) ?>
                    <!-- Form untuk menghapus tugas -->
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" style="display: inline;">
                        <!-- Mengirimkan indeks tugas yang akan dihapus -->
                        <input type="hidden" name="delete" value="<?= $index ?>">
                        <!-- Tombol untuk menghapus tugas -->
                        <button type="submit" class="delete-btn">Hapus</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>