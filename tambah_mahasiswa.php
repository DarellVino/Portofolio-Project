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

include "koneksi.php";

// ambil prodi
$prodi = mysqli_query($koneksi, "SELECT * FROM prodi");

$error = "";

// simpan
if (isset($_POST['simpan'])) {

    $npm      = $_POST['npm'];
    $nama     = $_POST['nama'];
    $kelas    = $_POST['kelas'];
    $semester = $_POST['semester'];
    $kd_prodi = $_POST['kd_prodi'];
    $jk       = $_POST['jenis_kelamin'];

    if (empty($npm) || empty($nama) || empty($kelas) || empty($semester)) {
        $error = "Data wajib diisi!";
    } else {

        mysqli_query(
            $koneksi,
            "INSERT INTO mahasiswa
        (npm,nama,kelas,semester,kd_prodi,jenis_kelamin)
        VALUES
        ('$npm','$nama','$kelas','$semester','$kd_prodi','$jk')"
        );

        header("location: mahasiswa.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <h2> Tambah Mahasiswa</h2>
        <hr>

        <?php if (!empty($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST">
            <table>
                <tr>
                    <td width="150">NPM</td>
                    <td><input type="text" name="npm" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><input type="text" name="kelas"></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <input type="radio" name="semester" value="I"> I
                        <input type="radio" name="semester" value="II"> II
                        <input type="radio" name="semester" value="III"> III
                        <input type="radio" name="semester" value="IV"> IV
                        <input type="radio" name="semester" value="V"> V
                        <input type="radio" name="semester" value="VI"> VI
                </tr>
                <tr>
                    <td>prodi</td>
                    <td>
                        <select name="kd_prodi" required>
                            <?php while ($p = mysqli_fetch_assoc($prodi)) { ?>
                                <option value="<?php echo $p['kd_prodi']; ?>">
                                    <?php echo $p['nama_prodi']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="simpan">SUBMIT</button>
                        <a href="mahasiswa.php" class="batal">BATAL</a>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>