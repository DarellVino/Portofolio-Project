<?php
function judul()
{
    echo "<h2>Praktikum Pemrograman Web!<h2>";
}
function garis()
{
    echo "<br/>===============================<br/>";
}
function mhs($nim, $nama, $semester)
{
    echo "NIM : $nim <br>";
    echo "Nama : $nama <br>";
    echo "Semester : $semester <br>";
}

judul();
garis();

mhs("09872222", "Umar Bakri", 3);
garis();

?>