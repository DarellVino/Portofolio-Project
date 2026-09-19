<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

$prodi = mysqli_query(
    $koneksi,
    "SELECT * FROM prodi"
);

if (isset($_POST['update'])) {

    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $semester = $_POST['semester'];
    $kd_prodi = $_POST['kd_prodi'];
    $jk = $_POST['jenis_kelamin'];

    mysqli_query(
        $koneksi,
        "UPDATE mahasiswa SET
    npm='$npm',
    nama='$nama',
    kelas='$kelas',
    semester='$semester',
    kd_prodi='$kd_prodi',
    jenis_kelamin='$jk'
    WHERE id='$id'"
    );

    header("location: mahasiswa.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>
</head>

<body>

    <h2>Edit Mahasiswa</h2>

    <form method="POST">

        NPM<br>
        <input type="text" name="npm"
            value="<?php echo $d['npm']; ?>">
        <br><br>

        Nama<br>
        <input type="text" name="nama"
            value="<?php echo $d['nama']; ?>">
        <br><br>

        Kelas<br>
        <input type="text" name="kelas"
            value="<?php echo $d['kelas']; ?>">
        <br><br>

        Semester<br>
        <input type="number" name="semester"
            value="<?php echo $d['semester']; ?>">
        <br><br>

        Prodi<br>
        <select name="kd_prodi">

            <?php
            while ($p = mysqli_fetch_array($prodi)) {
            ?>

                <option
                    value="<?php echo $p['kd_prodi']; ?>"

                    <?php
                    if ($p['kd_prodi'] == $d['kd_prodi']) {
                        echo "selected";
                    }
                    ?>>

                    <?php echo $p['nama_prodi']; ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        Jenis Kelamin<br>

        <input type="radio"
            name="jenis_kelamin"
            value="L"

            <?php
            if ($d['jenis_kelamin'] == "L") {
                echo "checked";
            }
            ?>>Laki-Laki

        <input type="radio"
            name="jenis_kelamin"
            value="P"

            <?php
            if ($d['jenis_kelamin'] == "P") {
                echo "checked";
            }
            ?>>Perempuan

        <br><br>

        <input type="submit"
            name="update"
            value="Update">

    </form>

</body>

</html>