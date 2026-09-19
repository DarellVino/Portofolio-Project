<?php
session_start();

//hapus semua session
session_unset();
session_destroy();

//hapus cache juga 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("location: index.php");
?>