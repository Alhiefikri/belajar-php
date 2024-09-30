<?php
// notice error 
$num = 5;
echo $number;
echo "ini code setelah notice errpr <br>";


// warning error
include('file_tidak_ada.php');
echo "ini code setelah warning error <br>";


// fatal error
// fungsitidakada();
// echo "ini code setelah fatal error";


function divide($numerator, $denumerator)
{
    if ($denumerator == 0) {
        throw new Exception("Pembagian dengan 0 itu tidak diperbolahkan");
    }
    return $numerator / $denumerator;
}

try {
    echo divide(10, 2);
} catch (Exception $e) {
    echo "<br>Pengecualian ditangkap : ", $e->getMessage(); // cara handle error
} finally {
    echo "<br>Blok finally ini selalu dijalankan";
}

// echo divide(10, 0);
// echo "eksekusi kode lain";
