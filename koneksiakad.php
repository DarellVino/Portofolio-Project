<?php

function koneksiAkademik(){

    $koneksi = mysqli_connect(
        "localhost",
        "root",
        "",
        "vino_akademik"
    );

    return $koneksi;
}

?>