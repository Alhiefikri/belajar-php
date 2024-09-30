<?php

// membuat array

// cara 1
$buah = ['apel', 'Pisang', 'Jeruk'];
// bisa disebut sebagai multidimensional array
$buah2 = [
    [
        'nama' => 'apel',
        "harga" => 25000
    ],
    [
        'nama' => 'pisang',
        "harga" => 15000
    ],
    [
        'nama' => 'Jeruk',
        "harga" => 10000
    ],
];

echo $buah2[0]["harga"];
// print_r($buah);

// cara 2
$sayur = array('kol', 'tauge', 'kangkung');
// print_r($sayur);


// akses array
// echo $sayur[2];

// array assosiatif
$umur = [
    "anto" => 21,
    "budi" => 25,
    "udin" => 19
];

// print_r($umur);

// kapan kita buth array assosiatif

// built-in function dalam array
$angka = [4, 5, 3, 1, 2];
// melakukan urutan naik
sort($angka);
print_r($angka);

// menggabungkan array
$list_hobby = ['catur', 'berenang'];
$list_hobby2 = ['basket', 'memanah'];
$Hobbies = array_merge($list_hobby, $list_hobby2);
print_r($Hobbies);

// mengecek element didalam array
if (in_array('memancing', $Hobbies)) {
    echo "berenang merupakan hobby anda";
} else {
    echo 'memancing bukan hobby anda';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($buah as $item): ?>
            <li><?php echo $item ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- looping array lebih gampang karena terdapat pada key -->
    <ul>
        <?php foreach ($buah2 as $item): ?>
            <li>nama buah :<?php echo $item['nama'] ?></li>
            <li>harga buah :<?php echo $item['harga'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>