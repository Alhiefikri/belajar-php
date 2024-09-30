<?php

require_once 'app/init.php';


// // Contoh penggunaan
// $produk1 = new Komik("Naruto", "Masashi Kihimoto", "Shonen Jump", 30000, 100);
// $produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 2500000, 50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// echo $cetakProduk->cetak();
// echo "<hr>";

use App\Service\User as ServiceUser;
use App\Produk\User as ProdukUser;

new ProdukUser();
echo "<br>";
new ServiceUser();
