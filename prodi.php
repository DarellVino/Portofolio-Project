<?php
session_start();
include "koneksi.php";

// Cek login
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location: index.php?p=Silahkan login terlebih dahulu");
    exit();
}

// Logika Pencarian
$cari = "";
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    // Query jika user melakukan pencarian (mencari berdasarkan kode atau nama prodi)
    $query = mysqli_query($koneksi, "SELECT * FROM prodi WHERE kd_prodi LIKE '%$cari%' OR nama_prodi LIKE '%$cari%'");
} else {
    // Query standar jika tidak ada pencarian
    $query = mysqli_query($koneksi, "SELECT * FROM prodi");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Prodi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Data Program Studi</h2>
            <hr><br>

            <div style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                <a href="tambah_prodi.php" class="submit" style="text-decoration: none; padding: 8px 15px; background-color: #2ecc71; color: white; border-radius: 4px; font-weight: bold;">+ Tambah Prodi</a>
                
                <form method="GET" action="">
                    <input type="text" name="cari" value="<?php echo $cari; ?>" placeholder="Cari Kode / Nama Prodi..." style="padding: 6px 10px; width: 220px; border: 1px solid #ccc; border-radius: 4px;">
                    <button type="submit" style="padding: 6px 12px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Cari</button>
                    <?php if($cari != "") { ?>
                        <a href="prodi.php" style="padding: 6px 12px; background-color: #95a5a6; color: white; text-decoration: none; border-radius: 4px; font-size: 13px; margin-left: 5px;">Reset</a>
                    <?php } ?>
                </form>
            </div>

            <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr style="background-color: #f2f2f2;">
                    <th>No</th>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $no = 1;
                if(mysqli_num_rows($query) > 0) {
                    while($data = mysqli_fetch_assoc($query)){ 
                ?>
                <tr>
                    <td align="center"><?php echo $no++; ?></td>
                    <td><?php echo $data['kd_prodi']; ?></td>
                    <td><?php echo $data['nama_prodi']; ?></td>
                    <td align="center">
                        <a href="edit_prodi.php?id_prodi=<?php echo $data['kd_prodi']; ?>">Edit</a> | 
                        <a href="hapus_prodi.php?id_prodi=<?php echo $data['kd_prodi']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4' align='center' style='color: red; padding: 15px;'>Data tidak ditemukan!</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>