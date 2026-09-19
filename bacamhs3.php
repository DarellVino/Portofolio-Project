<?php
include 'crudmhs.php';

$jurusan = "";
$nama_cari = "";
$data = [];

// Saat tombol OK ditekan
if (isset($_POST['tampilkan_jurusan'])) {

    // Jika jurusan dipilih
    if (!empty($_POST['jurusan'])) {

        $jurusan = $_POST['jurusan'];
        $data = bacaMhsPerJurusan($jurusan);
    } else {

        // Jika tidak pilih jurusan tampil semua data
        $data = bacaSemuaMhs();
    }
}

// Saat tombol Cari ditekan
if (isset($_POST['cari_nama'])) {

    $nama_cari = $_POST['nama_input'];
    $data = cariMhsDariNama($nama_cari);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Mahasiswa</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }

        .table thead {
            background-color: #1f2329;
            color: white;
        }

        .btn-ok {
            width: 110px;
            height: 50px;
            font-size: 20px;
        }

        .btn-reset {
            width: 250px;
            font-size: 22px;
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center py-3">

                <h2 class="h4 mb-0">
                    Manajemen Data Mahasiswa
                </h2>

            </div>

            <div class="card-body">

                <div class="row g-4">

                    <!-- FORM PILIH JURUSAN -->
                    <div class="col-md-6 border-end">

                        <form method="post">

                            <label class="fw-bold mb-3">
                                Pilih jurusan:
                            </label>

                            <div class="d-flex flex-wrap gap-3 mb-4">

                                <div class="form-check">

                                    <input class="form-check-input"
                                        type="radio"
                                        name="jurusan"
                                        id="TI"
                                        value="TI"
                                        <?= $jurusan == 'TI' ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="TI">
                                        TI
                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input"
                                        type="radio"
                                        name="jurusan"
                                        id="SI"
                                        value="SI"
                                        <?= $jurusan == 'SI' ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="SI">
                                        SI
                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input"
                                        type="radio"
                                        name="jurusan"
                                        id="MI"
                                        value="MI"
                                        <?= $jurusan == 'MI' ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="MI">
                                        MI
                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input"
                                        type="radio"
                                        name="jurusan"
                                        id="TK"
                                        value="TK"
                                        <?= $jurusan == 'TK' ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="TK">
                                        TK
                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input"
                                        type="radio"
                                        name="jurusan"
                                        id="KA"
                                        value="KA"
                                        <?= $jurusan == 'KA' ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="KA">
                                        KA
                                    </label>

                                </div>

                            </div>

                            <button type="submit"
                                name="tampilkan_jurusan"
                                class="btn btn-light border shadow-sm btn-ok">

                                - OK -

                            </button>

                        </form>

                    </div>

                    <!-- FORM CARI -->
                    <div class="col-md-6 d-flex align-items-center">

                        <form method="post" class="w-100">

                            <div class="row g-2 align-items-center">

                                <div class="col-auto">

                                    <label class="fw-bold">
                                        Cari Nama:
                                    </label>

                                </div>

                                <div class="col">

                                    <input type="text"
                                        name="nama_input"
                                        class="form-control"
                                        placeholder="Masukkan nama..."
                                        value="<?= $nama_cari ?>">

                                </div>

                                <div class="col-auto">

                                    <button type="submit"
                                        name="cari_nama"
                                        class="btn btn-success px-4">

                                        Cari

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- RESET -->
                <div class="text-center mt-4">

                    <a href="bacamhs3.php"
                        class="btn btn-secondary px-5 py-2 btn-reset">

                        Reset Tampilan

                    </a>

                </div>

                <hr class="my-4">

                <!-- TABEL -->
                <?php
                if (isset($_POST['tampilkan_jurusan']) || isset($_POST['cari_nama'])) {

                    if (empty($data)) {

                        echo "
                    <div class='alert alert-warning text-center small'>
                        Data tidak ditemukan
                    </div>
                    ";
                    } else {
                ?>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover">

                                <thead class="table-dark text-center">

                                    <tr>

                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kelamin</th>
                                        <th>Jurusan</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($data as $mhs) : ?>

                                        <tr>

                                            <td class="text-center">
                                                <?= $mhs['nim'] ?>
                                            </td>

                                            <td>
                                                <?= $mhs['nama'] ?>
                                            </td>

                                            <td class="text-center">
                                                <?= $mhs['kelamin'] ?>
                                            </td>

                                            <td class="text-center">
                                                <?= $mhs['jurusan'] ?>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>

                <?php
                    }
                }
                ?>

            </div>

        </div>

        <p class="text-center mt-3 text-muted small">
            Praktikum Pemrograman Web 2 - Modul 8
        </p>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>