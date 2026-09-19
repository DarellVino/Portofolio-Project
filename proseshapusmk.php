<?php

require 'crudmk.php';

$kode = $_GET["kode"];

if (hapusMtKuliah($kode)) {

    echo "
    <script>

        alert('Data berhasil dihapus');

        window.location='bacamk.php';

    </script>
    ";
} else {

    echo "
    <script>

        alert('Data gagal dihapus');

        window.location='bacamk.php';

    </script>
    ";
}
