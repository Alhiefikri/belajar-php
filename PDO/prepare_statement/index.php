<?php
/*
Prepared Statements adalah fitur di PDO yang memungkinkan kita untuk 
menyiapkan query SQL secara terpisah dari data yang akan dimasukkan 
ke dalam query tersebut. Dengan menggunakan prepared statements, 
kita dapat menghindari serangan SQL injection, karena data yang 
dimasukkan tidak akan diproses sebagai bagian dari query SQL. 
Ini juga meningkatkan efisiensi, karena statement yang sama 
dapat dieksekusi berkali-kali dengan parameter yang berbeda.
*/

require_once 'Connection.php'; // Mengimpor koneksi database

class Data
{
    private $pdo; // Variabel untuk menyimpan objek PDO

    public function __construct()
    {
        // Menginisialisasi koneksi PDO melalui kelas Connection
        $this->pdo = Connection::getConnection();
    }

    function insertData($nama, $alamat)
    {
        /* 
        Menggunakan prepared statement untuk menghindari SQL injection.
        Prepared statements memungkinkan kita untuk memisahkan struktur SQL 
        dari data, sehingga data yang diinputkan tidak akan diproses 
        sebagai bagian dari query SQL.
        */
        $sql = "INSERT INTO mahasiswa (nama, alamat) VALUES (:nama, :alamat)";

        // Memprepare statement untuk mencegah SQL injection
        $stmt = $this->pdo->prepare($sql);

        // Mengikat parameter yang akan diisi dengan nilai variabel
        $stmt->bindParam('nama', $nama);
        $stmt->bindParam('alamat', $alamat);

        // Menjalankan statement dan mengembalikan hasil eksekusi
        return $stmt->execute(); // Mengembalikan true jika berhasil, false jika gagal
    }

    function getLike($nama)
    {
        // Menambahkan wildcard (%) untuk pencarian yang fleksibel
        $parameter = '%' . $nama . '%';

        /* 
        Menggunakan prepared statement untuk pencarian yang aman. 
        Hal ini memungkinkan kita untuk menggunakan parameter dan 
        menghindari kemungkinan SQL injection saat pengguna memasukkan input.
        */
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE :nama";

        // Memprepare statement untuk query
        $stmt = $this->pdo->prepare($sql);

        // Mengikat parameter dengan wildcard
        $stmt->bindParam(":nama", $parameter);

        // Menjalankan statement
        $stmt->execute();

        // Mengembalikan semua hasil dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getIn(array $list)
    {
        // Membuat placeholder untuk parameter berdasarkan jumlah elemen dalam array
        $placeholder = str_repeat('?,', count($list) - 1) . '?';

        /* 
        Menggunakan prepared statement di sini juga untuk query IN, 
        yang memungkinkan kita untuk menyisipkan array parameter 
        tanpa mengubah struktur query, sehingga lebih aman dan efisien.
        */
        $sql = "SELECT * FROM mahasiswa WHERE nama IN ($placeholder)";

        // Memprepare statement untuk query
        $stmt = $this->pdo->prepare($sql);

        // Menjalankan statement dengan mengisi parameter dari array $list
        $stmt->execute($list);

        // Mengembalikan semua hasil dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$data = new Data();

// Contoh pemanggilan fungsi insertData (dihapus di sini)
// if ($data->insertData('Ali', 'Balantak')) {
//     echo "Data berhasil ditambahkan";
// } else {
//     echo "Data gagal ditambahkan";
// }

echo "<br> ---------------- Data dengan Like -------------- <br>";
// Mengambil data yang mirip dengan 'budi'
$mhs = $data->getLike('budi');
// Menampilkan hasil
foreach ($mhs as $m) {
    echo $m['nama'] . ' - ' . $m['alamat'] . ' <br>';
}

echo "<br> ---------------- Data dengan list -------------- <br>";
// Mengambil data dengan nama yang ada di array
$mhs = $data->getIn(['Budi', 'Budi Sudarsono']);
// Menampilkan hasil
foreach ($mhs as $m) {
    echo $m['nama'] . ' - ' . $m['alamat'] . ' <br>';
}
