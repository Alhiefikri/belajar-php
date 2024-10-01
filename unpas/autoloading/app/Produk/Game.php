<?php
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
