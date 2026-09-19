<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Peserta</title>
</head>

<body>
    <h2>Registrasi Peserta Kursus</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" size="30"></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="email" name="email" size="30"></td>
            </tr>
            <tr>
                <td valign="top">Nama Kursus:</td>
                <td>
                    <input type="checkbox" name="kursus[]" value="C#">C#<br>
                    <input type="checkbox" name="kursus[]" value="JavaScript">JavaScript<br>
                    <input type="checkbox" name="kursus[]" value="Perl">Perl<br>
                    <input type="checkbox" name="kursus[]" value="PHP">PHP<br>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $kursus = isset($_POST['kursus']) ? $_POST['kursus'] : [];

        if (!empty($nama) && !empty($email) && !empty($kursus)) {
            $jumlah = count($kursus);

            $total_biaya = $jumlah * 1000000;

            echo "<br>Terimakasih data anda telah diterima.<br>";
            echo "Kursus yang anda pilih sebanyak $jumlah buah yaitu: <br>";
            echo "<ul>";
            foreach ($kursus as $pilih) {
                echo "<li>$pilih</li>";
            }
            echo "</ul>";

            echo "Biaya kursus sebesar Rp. " . number_format($total_biaya, 0, ',', '.') . ",-";
        } else {
            echo "<br><b style='color:red'>Pesan: Silakan isi Nama, Email, dan pilih Kursus!</b>";
        }
    }
    ?>
</body>

</html>