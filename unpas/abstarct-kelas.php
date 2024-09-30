<?php

/**
 * ⁡⁢⁣⁣𝗔𝗽𝗮 𝗶𝘁𝘂 𝗮𝗯𝘀𝘁𝗿𝗮𝗰𝘁?⁡
 * 
 * ⁡⁣⁣⁢Dalam OOP PHP, kelas abstract adalah kelas yang tidak dapat diinstansiasi secara langsung.
 * Kelas ini berfungsi sebagai kerangka dasar untuk kelas lain dan dapat memiliki metode 
 * abstrak yang harus diimplementasikan oleh kelas turunan. 
 * Dengan menggunakan kelas abstract, kita dapat memastikan bahwa semua kelas turunan 
 * memiliki metode tertentu dan meningkatkan pengorganisasian kode.⁡
 */

abstract class Produk
{
    // Property produk
    private $judul, $penulis, $penerbit, $harga;
    protected $diskon = 0;

    // Constructor untuk inisialisasi property
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Setter dan getter untuk judul
    public function setJudul($judul)
    {
        $this->judul = $judul;
    }
    public function getJudul()
    {
        return $this->judul;
    }

    // Setter dan getter untuk penulis
    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }
    public function getPenulis()
    {
        return $this->penulis;
    }

    // Setter dan getter untuk penerbit
    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }
    public function getPenerbit()
    {
        return $this->penerbit;
    }

    // Setter dan getter untuk harga
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // Setter dan getter untuk diskon
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }
    public function getDiskon()
    {
        return $this->diskon;
    }

    // Mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // Metode abstrak yang harus diimplementasikan oleh kelas turunan
    abstract public function getInfoProduk();

    // Mendapatkan info dasar produk
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    public $jmlHalaman;

    // Constructor
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // Implementasi metode abstrak
    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk
{
    public $waktuMain;

    // Constructor
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // Implementasi metode abstrak
    public function getInfoProduk()
    {
        $str = "Game : " . $this->getInfo() . "  ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk
{
    public $daftarProduk = array();

    // Menambahkan produk ke daftar
    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }

    // Mencetak daftar produk
    public function cetak()
    {
        $str = "DAFTAR PRODUK: <br>";
        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}

// Contoh penggunaan
$produk1 = new Komik("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 2500000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
