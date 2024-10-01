<?php

/*
   ⁡⁣⁣⁢ Static dalam OOP adalah konsep di mana properti atau metode dapat 
    diakses tanpa perlu membuat instance (objek) dari kelas tersebut. 
    Properti atau metode static milik kelas, bukan milik objek, sehingga 
    dapat diakses langsung dengan menggunakan operator `::`.⁡

    ⁡⁢⁣⁣Dalam kode ini, kita memiliki kelas Contoh dengan properti static 
    $angka dan metode halo(). Metode halo() dapat mengakses 
    properti static $angka, dan nilainya akan meningkat setiap kali 
    metode tersebut dipanggil.⁡
*/

class Contoh
{
    public static $angka = 1; // Properti static

    // Metode untuk menampilkan pesan
    public function halo()
    {
        return "Halo " . self::$angka++ . " kali. <br>"; // Mengakses properti static
    }
}

// Membuat objek dari kelas Contoh
$obj = new Contoh;
echo $obj->halo(); // Mengakses metode halo() melalui objek
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

// Membuat objek baru dari kelas Contoh
$obj2 = new Contoh;
echo $obj2->halo(); // Memulai dari angka 1 lagi untuk objek baru
echo $obj2->halo();
echo $obj2->halo();
