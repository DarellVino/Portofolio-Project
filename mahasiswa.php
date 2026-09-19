<?php
session_start();

// anti cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// cek login
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silakan login terlebih dahulu!");
    exit();
}

// koneksi
include "koneksi.php";
// ambil data mahasiswa + prodi
$data = mysqli_query($koneksi, "
    SELECT m.*, p.nama_prodi
    FROM mahasiswa m
    JOIN prodi p ON m.kd_prodi = p.kd_prodi
");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>

<body>

    <!-- Navigasi -->
    <?php include "nav.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Data Mahasiswa</h2>
            <hr>

            <a href="tambah_mahasiswa.php" class="tambah">
                TAMBAH DATA MAHASISWA
            </a>

            <br><br>

            <table>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Prodi</th>
                    <th>ACTION</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?php echo $row['npm']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kelas']; ?></td>
                        <td><?php echo $row['nama_prodi']; ?></td>

                        <td>
                            <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>">
                                EDIT
                            </a>
                            |
                            <a href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Yakin ingin hapus data?')">
                                DELETE
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</body>

</html>