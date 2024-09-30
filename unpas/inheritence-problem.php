<?php

/*
    ⁡⁣⁣⁢Inheritance (pewarisan) adalah konsep dalam pemrograman berorientasi objek 
    di mana sebuah kelas (kelas anak) dapat mewarisi properti dan metode dari 
    kelas lain (kelas induk). Ini memungkinkan pengembang untuk mengorganisir 
    kode dengan lebih baik dan mengurangi duplikasi. Dalam contoh ini, 
    kelas Produk dapat digunakan sebagai kelas dasar untuk kelas-kelas 
    spesifik seperti Komik dan Game yang memiliki properti dan metode tambahan 
    sesuai kebutuhan masing-masing.⁡
*/

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga,
        $jmlHalaman,
        $waktuMain,
        $tipe;

    // Konstruktor untuk menginisialisasi objek Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    // Metode untuk mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // Metode untuk mendapatkan informasi lengkap produk
    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        // Menambahkan informasi tambahan berdasarkan tipe produk
        if ($this->tipe == "Komik") {
            $str .= " - $this->jmlHalaman Halaman. ";
        } else if ($this->tipe == "Game") {
            $str .= " - $this->waktuMain Jam. ";
        }
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

// Membuat objek dari kelas Produk
$produk1 = new Produk("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 2500000, 0, 50, "Game");

// Menampilkan informasi lengkap produk
echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
