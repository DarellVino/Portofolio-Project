<!-- index.php -->

<?php
session_start();

$_SESSION['login'] = false;
?>

<!DOCTYPE html>
<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h1>
            <center>PANEL LOGIN</center>
        </h1>

        <form action="cek_login.php" method="POST">

            <div class="form-control">

                <input type="text"
                    name="user"
                    placeholder="Masukan Username">

            </div>

            <div class="form-control">

                <input type="password"
                    name="pass"
                    placeholder="Masukan Password">

            </div>

            <div class="form-control">

                <button type="submit">
                    LOGIN
                </button>

            </div>

            <?php
            if (isset($_GET['p'])) {
            ?>

                <div class="pesan">

                    <?php echo $_GET['p']; ?>

                </div>

            <?php
            }
            ?>

        </form>

    </div>

</body>

</html>