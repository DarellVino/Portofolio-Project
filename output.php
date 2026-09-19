<?php
$nama = $_POST["nama"];
$jenis = $_POST["jenis"];
$seri = $_POST["seri"];
$merk = $_POST["merk"];
$negara = $_POST["negara"];

$tgl = $_POST["tgl"];
$bln = $_POST["bln"];
$thn = $_POST["thn"];

$harga = $_POST["harga"];
$stok = $_POST["stok"];

//$merk_besar = ucfirst($merk);

$kode_barang = [
    $jenis,
    str_pad($seri, 6, "0", STR_PAD_LEFT),
    substr($merk, 0, 3),
    substr($negara, 0, 3)
];

$kode_barang = implode("/", $kode_barang);

$tanggal_pembuatan = date("l, d F Y", strtotime("$thn-$bln-$tgl"));

$total = $harga * $stok;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Barang</h1>
    Kode : <?php echo $kode_barang; ?><br><br>
    Nama Barang : <?php echo $nama; ?><br><br>
    Nomer Seri : <?php echo $seri; ?><br><br>
    Merk : <?php echo $merk; ?><br><br>
    Negara Pembuat : <?php echo $negara; ?><br><br>
    Tanggal Pembuatan : <?php echo $tanggal_pembuatan; ?><br><br>
    Harga : Rp. <?php echo number_format($harga, 0, ",", "."); ?><br><br>
    Jumlah Stok : <?php echo $stok; ?><br><br>
    Total Harga : Rp. <?php echo number_format($total, 0, ",", "."); ?><br><br>
    <hr style="border: 1px solid black;">
</body>
</html>

