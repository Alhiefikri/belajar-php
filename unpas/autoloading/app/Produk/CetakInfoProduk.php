<?php
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
