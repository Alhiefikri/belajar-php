<?php

/*
   ⁡⁢⁣⁣ Kode ini mendefinisikan kelas Produk yang memiliki beberapa properti,
    yaitu judul, penulis, penerbit, dan harga. ⁡

    ⁡⁣⁣⁢Konstruktor adalah metode khusus yang dipanggil saat objek dibuat.
    Fungsinya untuk menginisialisasi properti objek dengan nilai yang diberikan.
    Jika tidak ada nilai yang disediakan saat instansiasi, nilai default akan digunakan.⁡
*/

class Produk
{
    // Mendeklarasikan properti kelas
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // Fungsi konstruktor
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        // Mengatur nilai properti sesuai dengan parameter
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Metode untuk mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit"; // Mengembalikan penulis dan penerbit
    }
}

// Membuat objek dari kelas Produk dengan berbagai parameter
$produk1 = new Produk("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 2500000);
$produk3 = new Produk("Dragon Ball"); // Menggunakan nilai default untuk beberapa parameter

// Menampilkan label dari produk pertama dan kedua
echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

// Menampilkan informasi objek produk ketiga
var_dump($produk3);
