<?php
// Inisialisasi variabel hasil perhitungan
$result = '';

// Mengecek apakah form telah disubmit
if (isset($_POST['calculate'])) {
    // Mengambil nilai input dari pengguna, disanitasi menggunakan htmlspecialchars untuk mencegah XSS
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $operator = $_POST['operator'];

    // Validasi apakah kedua input merupakan angka
    if (is_numeric($num1) && is_numeric($num2)) {
        // Memilih operasi berdasarkan operator yang dipilih
        switch ($operator) {
            case "add":
                $result = $num1 + $num2; // Operasi penjumlahan
                break;
            case "subtract":
                $result = $num1 - $num2; // Operasi pengurangan
                break;
            case "multiply":
                $result = $num1 * $num2; // Operasi perkalian
                break;
            case "divide":
                if ($num2 != 0) { // Cek untuk mencegah pembagian dengan nol
                    $result = $num1 / $num2; // Operasi pembagian
                } else {
                    $result = "Error: Pembagian dengan 0 tidak diperbolehkan"; // Pesan error
                }
                break;
        }
    } else {
        // Pesan jika input bukan angka
        $result = 'Angka tidak valid';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
    <!-- Menghubungkan file CSS eksternal untuk styling halaman -->
</head>

<body>
    <div class="calculator-container">
        <h1>Kalkulator Sederhana</h1>
        <!-- Form untuk input angka dan operator -->
        <form action="index.php" method="post" class="calculator-form">
            <!-- Input angka pertama, menyimpan nilai input sebelumnya jika ada error -->
            <input type="text" name="num1" id="num1" placeholder="Angka" value="<?= isset($_POST['num1']) ? $_POST['num1'] : '' ?>">
            <!-- Input angka kedua, juga menyimpan nilai sebelumnya jika ada error -->
            <input type="text" name="num2" id="num2" placeholder="Angka Kedua" value="<?= isset($_POST['num2']) ? $_POST['num2'] : '' ?>">

            <!-- Dropdown untuk memilih operator aritmatika -->
            <select name="operator" id="operator" class="operator">
                <!-- Setiap opsi operator akan tetap dipilih setelah submit -->
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'add' ? "selected" : "" ?> value="add">Tambah</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'subtract' ? "selected" : "" ?> value="subtract">Kurang</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'multiply' ? "selected" : "" ?> value="multiply">Kali</option>
                <option <?= isset($_POST['operator']) && $_POST['operator'] == 'divide' ? "selected" : "" ?> value="divide">Bagi</option>
            </select>

            <!-- Tombol submit untuk menghitung -->
            <button type="submit" name="calculate" class="calc-btn">Hitung</button>
        </form>

        <!-- Menampilkan hasil perhitungan atau pesan error -->
        <div class="result">Result: <?php echo htmlspecialchars($result) ?></div>
    </div>
</body>

</html>