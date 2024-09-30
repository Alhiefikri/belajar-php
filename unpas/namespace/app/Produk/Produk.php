<?php

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
