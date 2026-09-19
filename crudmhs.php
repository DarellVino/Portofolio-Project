<?php

function koneksiAkademik()
{

    $koneksi = mysqli_connect(
        "localhost",
        "root",
        "",
        "vino_akademik"
    );

    return $koneksi;
}

// membaca semua data mahasiswa
function bacaSemuaMhs()
{

    $koneksi = koneksiAkademik();

    $sql = "SELECT * FROM mahasiswa";

    $hasil = mysqli_query($koneksi, $sql);

    $data = array();

    if (mysqli_num_rows($hasil) > 0) {

        while ($baris = mysqli_fetch_assoc($hasil)) {

            $data[] = $baris;
        }

        mysqli_close($koneksi);

        return $data;
    } else {

        mysqli_close($koneksi);

        return null;
    }
}

// mencari mahasiswa berdasarkan nim
function cariMhs($nim)
{

    $koneksi = koneksiAkademik();

    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";

    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {

        $baris = mysqli_fetch_assoc($hasil);

        $data['nim'] = $baris['nim'];
        $data['nama'] = $baris['nama'];
        $data['kelamin'] = $baris['kelamin'];
        $data['jurusan'] = $baris['jurusan'];

        mysqli_close($koneksi);

        return $data;
    } else {

        mysqli_close($koneksi);

        return null;
    }
}

// mencari semua mahasiswa berdasarkan kondisi
function cariSemuaMhs($kondisi)
{

    $koneksi = koneksiAkademik();

    $sql = "SELECT * FROM mahasiswa WHERE $kondisi";

    $hasil = mysqli_query($koneksi, $sql);

    $data = array();

    if (mysqli_num_rows($hasil) > 0) {

        while ($baris = mysqli_fetch_assoc($hasil)) {

            $data[] = $baris;
        }

        mysqli_close($koneksi);

        return $data;
    } else {

        mysqli_close($koneksi);

        return null;
    }
}

// mengubah data mahasiswa
function ubahMhs($nim, $nama, $kelamin, $jurusan)
{

    $koneksi = koneksiAkademik();

    $sql = "UPDATE mahasiswa
            SET nama='$nama',
                kelamin='$kelamin',
                jurusan='$jurusan'
            WHERE nim='$nim'";

    if (mysqli_query($koneksi, $sql)) {

        $hasil = true;
    } else {

        $hasil = false;
    }

    mysqli_close($koneksi);

    return $hasil;
}
