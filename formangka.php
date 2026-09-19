<?php
  $nominal = isset ($_POST["nominal"]) ? $_POST["nominal"] : 0;  
  $format = number_format($nominal,2,",",".");
echo "Format Nominal : Rp.$format";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="#" method="POST"
   Nominal : <input type="text" name="nominal"><br/>
    <input type="submit" value="SUBMIT" />
</form>   
</body>
</html>
