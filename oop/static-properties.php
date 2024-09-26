<!-- ⁡⁣⁣⁢Static methods dan properties dapat diakses tanpa membuat objek dari class tersebu.⁡ -->

<?php

class Kalkulator
{
    public static function tambah($a, $b)
    {
        return $a + $b;
    }
}

// $calculate = new Kalkulator();
// echo $calculate->tambah(5, 3);


//cara penggunaanya
echo Kalkulator::tambah(10, 10);


?>