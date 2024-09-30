<?php

/*
    ⁡⁣⁣⁢Kode ini mendemonstrasikan konsep inheritance (pewarisan) dalam pemrograman 
    berorientasi objek. Kelas Produk berfungsi sebagai kelas dasar, dan 
    kelas Komik serta Game mewarisi sifat dan metode dari kelas Produk.⁡
    
    ⁡⁢⁣⁣Setiap kelas turunan (Komik dan Game) dapat memiliki metode mereka sendiri 
    untuk menampilkan informasi produk dengan format yang berbeda, 
    meskipun mereka mewarisi properti dasar dari kelas Produk.⁡
*/

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga,
        $jmlHalaman,
        $waktuMain;

    // Konstruktor untuk menginisialisasi objek Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }

    // Metode untuk mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // Metode untuk mendapatkan informasi dasar produk
    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

// Kelas Komik yang mewarisi dari kelas Produk
class Komik extends Produk
{
    // Override metode getInfoProduk untuk memberikan format khusus
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// Kelas Game yang mewarisi dari kelas Produk
class Game extends Produk
{
    // Override metode getInfoProduk untuk memberikan format khusus
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

// Kelas untuk mencetak informasi produk
class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat objek dari kelas Komik dan Game
$produk1 = new Komik("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 2500000, 0, 50);

// Menampilkan informasi produk
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
