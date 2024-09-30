<?php

/*
    ⁡⁣⁣⁢Overriding adalah konsep dalam pemrograman berorientasi objek di mana 
    metode yang didefinisikan dalam kelas anak memiliki implementasi yang 
    berbeda dari metode yang didefinisikan dalam kelas induk. 
    Dengan overriding, kelas anak dapat menyesuaikan atau memperluas 
    perilaku dari kelas induk sesuai kebutuhan.⁡

    ⁡⁢⁣⁣Dalam kode ini, kelas Komik dan Game mengoverride metode getInfoProduk 
    dari kelas Produk untuk memberikan format informasi yang sesuai 
    dengan tipe produk masing-masing. Ini memungkinkan penggunaan metode 
    yang sama (getInfoProduk) tetapi dengan hasil yang berbeda tergantung 
    pada objeknya.⁡
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
    public $jmlHalaman;

    // Konstruktor untuk menginisialisasi objek Komik
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman; // Inisialisasi jmlHalaman
    }

    // Mengoverride metode getInfoProduk untuk format khusus Komik
    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// Kelas Game yang mewarisi dari kelas Produk
class Game extends Produk
{
    public $waktuMain;

    // Konstruktor untuk menginisialisasi objek Game
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain; // Inisialisasi waktuMain
    }

    // Mengoverride metode getInfoProduk untuk format khusus Game
    public function getInfoProduk()
    {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
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
$produk1 = new Komik("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 2500000, 50);

// Menampilkan informasi produk
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
