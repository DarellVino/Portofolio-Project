<?php
function jumlah($bil1, $bil2)
{
    $jumlah = $bil1 + $bil2;
    return $jumlah;
}
function kurang($bil1, $bil2)
{
    $kurang = $bil1 - $bil2;
    return $kurang;
}
if($_POST["hitung"]=="jumlah"){
    $hasil = jumlah($_POST["bil1"], $_POST["bil2"]);
    echo "Hasil Penjumlahan : $hasil";
}
if($_POST["hitung"]=="kurang"){
    $hasil = kurang($_POST["bil1"], $_POST["bil2"]);
    echo "Hasil Pengurangan : $hasil";
}
?>