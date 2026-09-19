<?php

// menghapus cookie
setcookie("namauser", "", time() - 3600);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cookie 3</title>
</head>

<body>

    <?php

    echo "Cookie 'namauser' telah dihapus.";

    ?>

</body>

</html>