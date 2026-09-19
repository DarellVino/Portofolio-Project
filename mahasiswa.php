<?php
session_start();

//anti cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

//cek login
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location: index.php?p=Silahkan login terlebih dahulu");
    exit();
}

//koneksi
include "koneksi.php";

//Logika Pencarian
$cari = "";
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    // Mencari data berdasarkan npm ATAU nama mahasiswa dengan JOIN prodi
    $data = mysqli_query($koneksi, "SELECT m.*, p.nama_prodi FROM mahasiswa m JOIN prodi p ON m.kd_prodi=p.kd_prodi WHERE m.npm LIKE '%$cari%' OR m.nama LIKE '%$cari%'");
} else {
    // Ambil data mahasiswa + prodi standar jika tidak ada pencarian
    $data = mysqli_query($koneksi, "SELECT m.*, p.nama_prodi FROM mahasiswa m JOIN prodi p ON m.kd_prodi=p.kd_prodi");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Data Mahasiswa</h2>
            <hr>
            
            <?php if(isset($_SESSION['pesan_sukses'])) { ?>
                <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px; margin-bottom: 20px; border-radius: 4px; font-size: 14px;">
                    <?php 
                        echo $_SESSION['pesan_sukses']; 
                        unset($_SESSION['pesan_sukses']); 
                    ?>
                </div>
            <?php } ?>

            <div style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                <a href="tambah_mahasiswa.php" class="tambah" style="margin-bottom: 0;">TAMBAH DATA MAHASISWA</a>
                
                <form method="GET" action="">
                    <input type="text" name="cari" value="<?php echo htmlspecialchars($cari); ?>" placeholder="Cari NPM atau Nama..." style="padding: 7px 10px; width: 220px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    <button type="submit" style="padding: 7px 15px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 14px;">Cari</button>
                    
                    <?php if($cari != "") { ?>
                        <a href="mahasiswa.php" style="padding: 7px 12px; background-color: #95a5a6; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; margin-left: 5px; font-weight: bold;">Reset</a>
                    <?php } ?>
                </form>
            </div>

            <table>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Prodi</th>
                    <th>Jenis Kelamin</th>
                    <th>ACTION</th>
                </tr>

                <?php 
                if(mysqli_num_rows($data) > 0) {
                    while($row = mysqli_fetch_assoc($data)){ 
                ?>
                <tr>
                    <td><?php echo $row['npm']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['nama_prodi']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td>
                        <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>">EDIT</a>
                        <a href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin hapus data?')">DELETE</a>
                    </td>
                </tr>
                <?php 
                    } // Ini penutup milik while
                } else { // Ini blok jika data kosong
                ?>
                <tr>
                    <td colspan="7" align="center" style="color: red; padding: 20px; font-weight: bold;">Data mahasiswa tidak ditemukan!</td>
                </tr>
                <?php 
                } // Ini penutup milik else yang kemarin hilang/kurang
                ?>
            </table>
        </div>
    </div>
</body>
</html>