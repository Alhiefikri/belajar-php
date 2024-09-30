<?php

/*
    ⁡⁣⁣⁢Visibility dalam OOP mengacu pada aksesibilitas properti dan metode 
    di dalam kelas. Ada tiga jenis visibility di PHP:
    1. **Public**: Dapat diakses dari mana saja, termasuk dari luar kelas.
    2. **Protected**: Hanya dapat diakses di dalam kelas itu sendiri dan 
       oleh kelas yang mewarisi (subclass) dari kelas tersebut.
    3. **Private**: Hanya dapat diakses di dalam kelas itu sendiri, tidak 
       dapat diakses oleh subclass atau instansi dari kelas lain.⁡

    ⁡⁢⁣⁣Dalam kode ini, kelas Produk memiliki properti dengan berbagai 
    visibility:
    - `$judul`, `$penulis`, dan `$penerbit` adalah public dan dapat diakses 
      dari luar.
    - `$diskon` adalah protected dan hanya dapat diakses di dalam kelas 
      Produk dan subclass-nya.
    - `$harga` adalah private dan hanya dapat diakses di dalam kelas Produk.⁡
*/

class Produk
{
    public $judul,
        $penulis,
        $penerbit;

    protected $diskon = 0; // Hanya dapat diakses oleh kelas Produk dan subclass

    private $harga; // Hanya dapat diakses oleh kelas Produk

    // Konstruktor untuk menginisialisasi objek Produk
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Metode untuk mendapatkan harga setelah diskon
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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
        $this->jmlHalaman = $jmlHalaman; // Inisialisasi jumlah halaman
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
        $this->waktuMain = $waktuMain; // Inisialisasi waktu main
    }

    // Setter untuk diskon
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon; // Mengatur diskon
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
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})"; // Tidak bisa mengakses $harga secara langsung
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

// ⁡⁢⁣⁢𝗢𝘂𝘁𝗽𝘂𝘁⁡
// ⁡⁣⁣⁢Komik : Naruto | Masashi Kihimoto, Shonen Jump (Rp. 30000) - 100 Halaman.⁡
// ⁡⁢⁣⁣Game : Uncharted | Neil Druckman, Sony Computer (Rp. 2500000) ~ 50 Jam.
// 1250000⁡
