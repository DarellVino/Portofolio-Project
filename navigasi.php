<nav class="navbar">
    <span class="open-slide">
        <a href="#" onclick="openSlideMenu();">
            <svg width="30" height="30">
                <path d="M0, 5, 30, 5" stroke="#fff" stroke-width="5" />
                <path d="M0, 14, 30, 14" stroke="#fff" stroke-width="5" />
                <path d="M0, 23, 30, 23" stroke="#fff" stroke-width="5" />
            </svg>
        </a>
    </span>

    <ul class="navbar-nav" style="display: flex; align-items: center;">
        <li><a href="home.php">Home</a></li>
        <li><a href="mahasiswa.php">Mahasiswa</a></li>
        <li><a href="prodi.php">Prodi</a></li>
        <li><a href="edit_profil.php" style="color: #ffca28; font-weight: bold;">Edit Profil</a></li>

        <li class="logout" style="display: flex; align-items: center; gap: 8px;">
            <?php
            $foto_kamu = "meliana.jpg";
            if (file_exists($foto_kamu)) {
                $src_foto = $foto_kamu;
            } else {
                $src_foto = "https://cdn-icons-png.flaticon.com/512/3135/3135715.png";
            }
            ?>
            <img src="<?php echo $src_foto; ?>?t=<?php echo time(); ?>" alt="User" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; border: 1.5px solid #fff; vertical-align: middle;">

            <a href="logout.php" style="padding-left: 0;">(<?php echo $_SESSION['user']; ?>)Logout</a>
        </li>
    </ul>
</nav>

<div id="side-menu" class="side-nav">
    <div class="user-profile-top" style="text-align: center; padding: 25px 10px 15px 10px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 10px;">
        <img src="<?php echo $src_foto; ?>?t=<?php echo time(); ?>" alt="Foto Profil" style="width: 85px; height: 85px; border-radius: 50%; object-fit: cover; border: 3px solid #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.3); display: inline-block;">

        <h4 style="color: #fff; margin: 10px 0 0 0; font-size: 16px; font-family: Arial, sans-serif; letter-spacing: 0.5px;">
            <?php echo isset($_SESSION['user']) ? strtoupper($_SESSION['user']) : 'MELIANA'; ?>
        </h4>
        <span style="color: #2ecc71; font-size: 11px; font-family: Arial, sans-serif; display: block; margin-top: 5px;">● Online</span>
    </div>

    <a href="#" class="btn-close" onclick="closeSlideMenu();" style="top: 10px; right: 15px;">&times;</a>

    <a href="home.php">Home</a>
    <a href="mahasiswa.php">Mahasiswa</a>
    <a href="prodi.php">Prodi</a>
    <a href="edit_profil.php">Edit Profil</a>
    <a href="logout.php">(<?php echo $_SESSION['user']; ?>)Logout</a>
</div>