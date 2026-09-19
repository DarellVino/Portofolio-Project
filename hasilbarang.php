<?php
// CEK: hanya jalan kalau tombol submit ditekan
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nama   = $_POST['nama'];
    $seri   = $_POST['seri'];
    $merk   = $_POST['merk'];
    $negara = $_POST['negara'];
    $jenis  = $_POST['jenis'];
    $tgl    = $_POST['tgl'];
    $bln    = $_POST['bln'];
    $thn    = $_POST['thn'];
    $harga  = $_POST['harga'];
    $stok   = $_POST['stok'];

    $harga_bersih = str_replace(["Rp.", " ", "."], "", $harga);

    $kode = strtoupper(substr($nama,0,3)) .
            str_pad($seri,6,"0",STR_PAD_LEFT) .
            strtoupper(substr($merk,0,3)) .
            strtoupper(substr($negara,0,3));

    $tanggal = date("d F Y", mktime(0,0,0,$bln,$tgl,$thn));
    $total = $harga_bersih * $stok;
    $harga_format = number_format($harga_bersih,0,",",".");
    $total_format = number_format($total,0,",",".");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form & Hasil Barang</title>
</head>
<body>

<h2>FORM INPUT BARANG</h2>

<form method="post">
    Nama Barang : <input type="text" name="nama"><br><br>

    Nomor Seri : <input type="text" name="seri"><br><br>

    Merk : <input type="text" name="merk"><br><br>

    Negara Pembuat : <input type="text" name="negara"><br><br>

    Jenis :
    <select name="jenis">
        <option value="PC">PC Komputer</option>
        <option value="LP">Laptop</option>
        <option value="PR">Peripheral</option>
        <option value="SP">Smart Phone</option>
        <option value="IP">I-Pad</option>
    </select><br><br>

    Tanggal Pembuatan :
    <select name="tgl">
        <?php 
        for($i=1;$i<=31;$i++) echo "<option>$i</option>"; ?>
    </select>

    <select name="bln">
        <?php
         for($i=1;$i<=12;$i++) echo "<option>$i</option>"; ?>
    </select>

    <select name="thn">
        <?php
         for($i=2020;$i<=2026;$i++) echo "<option>$i</option>"; ?>
    </select>
    <br><br>

    Harga Barang : <input type="text" name="harga" placeholder="Rp. 925000"><br><br>

    Jumlah Stok : <input type="text" name="stok"><br><br>

    <input type="submit" value="SUBMIT">
    <input type="reset" value="RESET">
</form>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){ ?>

<hr>

<h2>HASIL DATA BARANG</h2>
Kode Barang : <?php echo $kode; ?><br><br>
Nama Barang : <?php echo $nama; ?><br><br>
Jenis : <?php echo $jenis; ?><br><br>
Tanggal Pembuatan : <?php echo $tanggal; ?><br><br>
Harga : Rp. <?php echo $harga_format; ?><br><br>
Jumlah Stok : <?php echo $stok; ?><br><br>
Total Harga : Rp. <?php echo $total_format; ?><br><br>

<?php 
} ?>
</body>
</html>