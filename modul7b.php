<!DOCTYPE html>
<html>

<head>
    <title>Form Login</title>
</head>

<body>
    <p>Form Login</p>
    <form method="post" action="<?php echo
                                htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>User name:</td>
                <td><input type="text" name="username" size="30"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password"
                        size="30" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="OK"></td>
            </tr>

            <p>Form Login</p>
            <?php
            if (array_key_exists('username', $_POST)) {
                $username = trim($_POST['username']);
                if (empty($username))
                    echo "<span style='color:red'>Username belum diisi</span><br>";
            }
            ?>
        </table>
    </form>
</body>

</html>