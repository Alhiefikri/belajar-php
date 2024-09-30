<!-- ⁡⁣⁣⁢Interface: Kumpulan method yang harus diimplementasikan oleh class yang "mengimplementasikan" interface tersebut.⁡ -->

<?php
interface Kendaraan
{
    public function bergerak();
    // public function berhenti();
}

class Mobil implements Kendaraan
{
    public function bergerak()
    {
        echo "mobil berjalan <br>";
    }
}

$avanza = new Mobil();
$avanza->bergerak();


?>