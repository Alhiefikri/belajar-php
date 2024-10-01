<?php

/*
    ⁡⁣⁣⁢Setter dan getter adalah metode yang digunakan untuk mengatur dan 
    mengambil nilai dari properti dalam sebuah kelas. Dengan menggunakan 
    setter dan getter, kita dapat mengontrol akses ke properti, 
    memastikan bahwa nilai yang dimasukkan valid, dan menyembunyikan 
    detail implementasi dari pengguna kelas.⁡

    ⁡⁢⁣⁣Dalam kode ini, kelas Produk memiliki beberapa setter dan getter 
    untuk properti private seperti $judul, $penulis, $penerbit, dan $harga. 
    Dengan ini, pengguna dapat mengakses dan memodifikasi nilai 
    dari properti tersebut dengan cara yang aman.⁡
*/

class Produk
{
    private $judul,
        $penulis,
        $penerbit,
        $harga;

    protected $diskon = 0;

    // Konstruktor untuk menginisialisasi objek Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Setter untuk judul
    public function setJudul($judul)
    {
        $this->judul = $judul;
    }

    // Getter untuk judul
    public function getJudul()
    {
        return $this->judul;
    }

    // Setter untuk penulis
    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    // Getter untuk penulis
    public function getPenulis()
    {
        return $this->penulis;
    }

    // Setter untuk penerbit
    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    // Getter untuk penerbit
    public function getPenerbit()
    {
        return $this->penerbit;
    }

    // Setter untuk harga
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    // Getter untuk harga dengan diskon
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // Setter untuk diskon
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    // Getter untuk diskon
    public function getDiskon()
    {
        return $this->diskon;
    }

    // Metode untuk mendapatkan label produk
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    // Metode untuk mendapatkan informasi produk
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
echo "<hr>";

// Menggunakan setter untuk mengatur diskon
$produk2->setDiskon(50);
echo $produk2->getHarga(); // Menampilkan harga setelah diskon
echo "<hr>";

// Menggunakan setter untuk mengubah judul
$produk1->setJudul("One Piece");
echo $produk1->getPenulis(); // Menampilkan penulis dari produk1
