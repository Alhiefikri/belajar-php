<?php

/* 
    Apa itu Interface?
    Interface adalah kontrak yang mendefinisikan metode yang harus diimplementasikan oleh kelas yang menggunakannya. 
    Dengan interface, kita dapat memastikan bahwa kelas-kelas tersebut memiliki metode yang diharapkan 
    tanpa perlu mengetahui bagaimana metode tersebut diimplementasikan.

    Contoh Penggunaan:
    Di sini, kita mendefinisikan interface `InfoProduk` yang memiliki metode `getInfoProduk()`.
    Kelas `Komik` dan `Game` mengimplementasikan interface ini, yang berarti mereka harus menyediakan
    implementasi untuk `getInfoProduk()`. Dengan cara ini, kita dapat memperlakukan kedua kelas ini secara 
    seragam saat memanggil metode tersebut, meskipun mereka mungkin memiliki detail yang berbeda.

    Contoh kode:
    - Kelas `Komik` mengimplementasikan metode `getInfoProduk()` untuk menampilkan informasi komik.
    - Kelas `Game` juga mengimplementasikan metode yang sama, tetapi untuk menampilkan informasi game.
    - Kelas `CetakInfoProduk` mengumpulkan produk dan mencetak informasi dengan memanggil `getInfoProduk()` 
      tanpa harus mengetahui detail spesifik dari produk yang ditangani.
*/

interface InfoProduk
{
    public function getInfoProduk(); // Metode yang harus diimplementasikan
}

abstract class Produk
{
    // Property produk
    protected $judul, $penulis, $penerbit, $harga, $diskon = 0;

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
    abstract public function getInfo();
}

class Komik extends Produk implements InfoProduk
{
    public $jmlHalaman;

    // Constructor
    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // Mendapatkan info dasar produk
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    // Implementasi metode dari interface
    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk implements InfoProduk
{
    public $waktuMain;

    // Constructor
    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // Mendapatkan info dasar produk
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

    // Implementasi metode dari interface
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
