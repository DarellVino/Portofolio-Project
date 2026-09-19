<?php
session_start();

$_SESSION['login'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARA MEMBUAT LOGIN DENGAN SESSION DI PHP</title>
    <style type="text/css">
        body {font-family: Verdana; font: size 14px; background-color: #f7f7f7;}
        input, button{padding:7px}
        button{cursor:pointer}
        .container{background-color: #ffffff; border: 1px solid#000000; padding: 10px; width: 400px; margin: 0 auto;}
        .container .form-control{margin-bottom: 10px; width: 100%;}
        .container .form-control:last-child{margin-bottom: 0;}
        .container .form-control input{width: 380px;}
        .container .form-control button{width: 397px;}
        .container .pesan{color: #ffffff; text-align: center; padding: 7px; background-color: #ff0000; font-weight: bold;}
    </style>
</head>
<body>
    <div class="container">
        <h1><center>PANEL LOGIN</center></h1>
        <hr/>
        <form action="cek_login.php" method="POST">
            <div class="form-control">
                <input type="text" name="user" placeholder="Masukan Username">
            </div>
            <div class="form-control">
                <input type="password" name="pass" placeholder="Masukan Password">
            </div>
            <div class="form-control">
                <button type="submit">LOGIN</button>
            </div>
            <?php
            //jika mendapatkan parameter $_GET['p']
            if(isset($_GET['p'])){
                ?>
                <div class="pesan"><?php echo$_GET['p'];?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>