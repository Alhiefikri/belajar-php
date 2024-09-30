<?php

/*
   ⁡⁣⁣⁢ Objek adalah instans dari kelas yang memiliki properti dan metode.
    Tipe merujuk pada kelas yang mendefinisikan struktur dan perilaku objek.⁡
    ⁡⁢⁣⁣Dalam kode ini, objek dibuat dari kelas Produk dan kelas CetakInfoProduk
    digunakan untuk mencetak informasi dari objek tersebut.⁡
*/

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // Konstruktor untuk menginisialisasi objek Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Metode untuk mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}

// Kelas untuk mencetak informasi produk
class CetakInfoProduk
{
    public function cetak(Produk $produk) // Tipe parameter didefinisikan sebagai Produk
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat objek dari kelas Produk
$produk1 = new Produk("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 2500000);

// Menampilkan label dari produk
echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

// Menggunakan kelas CetakInfoProduk untuk mencetak informasi produk
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);
