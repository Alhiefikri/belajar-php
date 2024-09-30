<!-- ⁡⁣⁣⁢𝗧𝗿𝗮𝗶𝘁 adalah mekanisme untuk meminjam method ke beberapa class. Traits memungkinkan reuse kode tanpa menggunakan pewarisan.⁡ -->


<?php
trait Pesan
{
    public function tampilPesan()
    {
        return "ini adalah pesan dari Trait";
    }
    public function sayHello()
    {
        return "hello dari trait";
    }
}



class A
{
    use Pesan;
}

$a = new A();
echo $a->tampilPesan();
echo $a->sayHello();



?>