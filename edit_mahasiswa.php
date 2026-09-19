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

//validasi id
if(!isset($_GET['id'])){
    header("location: mahasiswa.php");
    exit();
}

$id = $_GET['id'];

//ambil data mahasiswa
$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa where id='$id'");
$data = mysqli_fetch_assoc($query);

//jika data tidak ditemukan
if(!$data){
    header("location: prodi.php");
    exit();
}

//ambil prodi
$prodi = mysqli_query($koneksi, "SELECT * from prodi");
$error = "";

//proses update
if(isset($_POST['update'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $semester = isset($_POST['semester']) ? $_POST['semester'] : ''; // Mencegah notice jika kosong
    $kd_prodi = $_POST['kd_prodi'];
    $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : ''; // Mencegah notice jika kosong

    // Sesuai Instruksi Lembar Tugas: Validasi jika ada field yang kosong saat update
    if(empty($npm) || empty($nama) || empty($kelas) || empty($semester) || empty($kd_prodi) || empty($jk)){
        // Menggunakan javascript alert "Data Tidak Boleh Kosong"
        echo "<script>alert('Data Tidak Boleh Kosong'); window.history.back();</script>";
        exit();
    }else{
        $update = mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama='$nama', kelas='$kelas', semester='$semester', kd_prodi='$kd_prodi', jenis_kelamin='$jk' Where id='$id'");

        if($update){
            echo "<script>alert('Data Berhasil Disimpan'); window.location.href='mahasiswa.php';</script>";
            exit();
        }else{
            echo "<script>alert('Data Gagal Disimpan'); window.history.back();</script>";
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "navigasi.php"; ?>

    <div id="main">
        <div class="container">
            <h2>Edit Mahasiswa</h2>
            <hr>

            <form method="POST">
                <table>
                    <tr>
                        <td width="150">NPM</td>
                        <td><input type="text" name="npm" value="<?php echo $data['npm']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td><input type="text" name="kelas" value="<?php echo $data['kelas']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>
                            <input type="radio" name="semester" value="I" <?php if($data['semester']=="I") echo "checked"; ?>>I
                            <input type="radio" name="semester" value="II" <?php if($data['semester']=="II") echo "checked"; ?>>II
                            <input type="radio" name="semester" value="III" <?php if($data['semester']=="III") echo "checked"; ?>>III
                            <input type="radio" name="semester" value="IV" <?php if($data['semester']=="IV") echo "checked"; ?>>IV
                            <input type="radio" name="semester" value="V" <?php if($data['semester']=="V") echo "checked"; ?>>V
                            <input type="radio" name="semester" value="VI" <?php if($data['semester']=="VI") echo "checked"; ?>>VI
                        </td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>
                            <select name="kd_prodi">
                                <option value="">-- Pilih Prodi --</option>
                                <?php while($p = mysqli_fetch_assoc($prodi)){ ?>
                                    <option value="<?php echo $p['kd_prodi']; ?>" <?php if($p['kd_prodi'] == $data['kd_prodi']) echo "selected"; ?>>
                                        <?php echo $p['nama_prodi']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" value="L"<?php if($data['jenis_kelamin']=="L") echo "checked";?>>Laki-Laki
                            <input type="radio" name="jenis_kelamin" value="P"<?php if($data['jenis_kelamin']=="P") echo "checked";?>>Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="update" class="submit">UPDATE</button>
                            <a href="mahasiswa.php" class="batal">Batal</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>