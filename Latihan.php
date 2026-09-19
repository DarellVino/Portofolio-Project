<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Latihan PHP Aman</title>
</head>
<body>

<h1>Latihan PHP</h1>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Hello PHP!!! <br><br>";

// Operasi Matematika
$a = 20;
$b = 5;
$c = $a * $b;
$d = $c / $b;
$e = $d - $b;

echo "Hasil Perhitungan: <br>";
echo "$c | $d | $e <br><br>";

// Penggabungan String
$a = "Yogyakarta ";
$a .= "Kotaku";
echo $a . "<br>";

$b = "STMIK AKAKOM ";
$b .= "Kampusku";
echo $b . "<br><br>";

// Operasi Angka Aman
$beli1 = 5;
$beli2 = 7;
$hasil1 = $beli1 + $beli2;
$hasil2 = $beli1 . $beli2;

echo "Hasil1 (Penjumlahan) : $hasil1 <br>";
echo "Hasil2 (Penggabungan) : $hasil2 <br><br>";

// Tipe Data
$a = 5;
$b = 2.5;
$komentar = "Selamat Datang";

echo "Nilai a = $a <br>";
echo "Nilai b = $b <br>";
echo "Komentar = $komentar <br>";

$hasil = $a + $b;
echo "Hasil jumlah a + b = $hasil <br><br>";

// Tampilan Pesan
$nama = "STMIK AKAKOM";
$garis = "=====================================";

echo "<p>";
echo $garis . "<br>";
echo $komentar . " di Lab " . $nama . "<br>";
echo "Belajar dengan giat ya.... <br>";
echo $garis . "<br><br>";

// Single & Double Quote
$jumlah = 4 + 3;

echo 'Single quoted <br />';
echo 'Budi berkata, "I\'ll do the PHP code" <br />';
echo 'PHP ini terletak di C:\\php\\ <br />';
echo 'Variabel seperti $jumlah tidak akan ditulis valuenya <br />';
echo '=====================================<br/>';

echo "Double quoted <br />";
echo "Budi berkata, 'I\"ll do the PHP code' <br />";
echo "PHP ini terletak di C:\\php\\<br />";
echo "Variabel \$jumlah mempunyai value $jumlah <br />";

?>

</body>
</html>