<?php
session_start();

//anti cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

//cek login
if(!isset($_SESSION['login']) || $_SESSION['login']!= true){
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}

//koneksi
include "koneksi.php";

//ambil prodi
$prodi = mysqli_query($koneksi, "SELECT * from prodi");
$error = "";

//simpan
if(isset($_POST['simpan'])){
    $npm  = $_POST['npm'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $semester = isset($_POST['semester']) ? $_POST['semester'] : ''; // Mencegah notice jika radio button kosong
    $kd_prodi = $_POST['kd_prodi'];
    $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : ''; // Mencegah notice jika radio button kosong

    // Sesuai Instruksi Lembar Tugas: Validasi jika ada field yang kosong
    if(empty($npm) || empty($nama) || empty($kelas) || empty($semester) || empty($kd_prodi) || empty($jk)) {
        // Menggunakan javascript alert sesuai contoh di gambar tugas
        echo "<script>alert('Data Tidak Boleh Kosong'); window.history.back();</script>";
        exit();
    } else {
        // Cek apakah NPM sudah terdaftar sebelumnya agar tidak duplikat
        $cek_npm = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
        if(mysqli_num_rows($cek_npm) > 0) {
            echo "<script>alert('NPM sudah terdaftar di sistem!'); window.history.back();</script>";
            exit();
        } else {
            $query_simpan = "INSERT into mahasiswa (npm, nama, kelas, semester, kd_prodi, jenis_kelamin) 
                             VALUES ('$npm', '$nama', '$kelas', '$semester', '$kd_prodi', '$jk')";
            $simpan = mysqli_query($koneksi, $query_simpan);

            if($simpan) {
                $_SESSION['pesan_sukses'] = "Data mahasiswa baru bernama $nama berhasil ditambahkan!";
                echo "<script>alert('Data Berhasil Disimpan'); window.location.href='mahasiswa.php';</script>";
                exit();
            } else {
                echo "<script>alert('Data Gagal Disimpan: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Tambah Mahasiswa</h2>
            <hr>

            <form method="POST">
                <table>
                    <tr>
                        <td width="150">NPM</td>
                        <td><input type="text" name="npm"></td>
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
                            <input type="radio" name="semester" value="I">I
                            <input type="radio" name="semester" value="II">II
                            <input type="radio" name="semester" value="III">III
                            <input type="radio" name="semester" value="IV">IV
                            <input type="radio" name="semester" value="V">V
                            <input type="radio" name="semester" value="VI">VI
                        </td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>
                          <select name="kd_prodi">
                            <option value="">-- Pilih Prodi --</option>
                            <?php while($p = mysqli_fetch_assoc($prodi)){ ?>
                            <option value="<?php echo $p['kd_prodi']; ?>" <?php echo (isset($_POST['kd_prodi']) && $_POST['kd_prodi'] == $p['kd_prodi']) ? 'selected' : ''; ?>>
                                <?php echo $p['nama_prodi']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki
                            <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="simpan" class="submit">SUBMIT</button>
                            <a href="mahasiswa.php" class="batal">BATAL</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>