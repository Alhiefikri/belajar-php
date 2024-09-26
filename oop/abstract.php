<!-- ⁡⁣⁣⁢Abstract dalam OOP (Object-Oriented Programming) adalah konsep di mana sebuah class yang tidak bisa langsung diinstansiasi (dibuat objeknya) dan hanya dapat digunakan sebagai blueprint (kerangka) oleh class turunannya. Class yang didefinisikan sebagai abstract class biasanya memiliki method yang tidak memiliki implementasi konkret di dalamnya, sehingga class turunannya wajib mengimplementasikan method tersebut.⁡ -->


<?php
abstract class Hewan
{
    abstract public function bersuara();
}

class Kucing extends Hewan
{
    public function bersuara()
    {
        echo "miaw";
    }
}

$kucing = new Kucing();
echo $kucing->bersuara();

$hewanSaya = new Hewan();
