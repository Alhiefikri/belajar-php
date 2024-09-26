<?php
class Produk
{
    // Properti kelas Produk
    public $nama;        // Bisa diakses dari mana saja
    protected $harga;    // Hanya bisa diakses dari dalam kelas dan turunannya (anak class)
    private $stok;       // Hanya bisa diakses dari dalam class itu sendiri

    // Method untuk mengatur nilai stok
    public function setStok($stok)
    {
        $this->stok = $stok;  // Mengatur nilai $stok (yang private) melalui fungsi publik
    }

    // Method untuk mendapatkan nilai stok
    public function getStock()
    {
        return $this->stok;    // Mengembalikan nilai $stok
    }
}

// Membuat objek baru dari class Produk
$produkSaya = new Produk();
$produkSaya->nama = "Laptop";   // Mengatur nilai properti public 'nama'
echo $produkSaya->nama;         // Menampilkan nilai properti public 'nama'

// Mengatur nilai stok menggunakan method setStok
$produkSaya->setStok(200000000);
// Menampilkan nilai stok yang di-set sebelumnya
echo $produkSaya->getStock();
