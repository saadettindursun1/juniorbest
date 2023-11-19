<?php
session_start();
$login_type = $_SESSION["user_login_type"];
if ($login_type != 2) {
    header("Location:../login.php");
}
require_once("../class-loader.php");
$jb_mysql = new jbMysql();
$jb_uploads = new jbUploads();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junior Best</title>
    <link rel="stylesheet" href="../css/panel-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="top-menu">
        <div class="top-menu-left">
            <img src="../img/junior-best-logo-dark.png">
            <!-- arama kutusu yapılacak! -->
        </div>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Ara...">
            <button class="search-button">Arama</button>
        </div>
        <div class="top-menu-right">

            <div class="ustmenu-icons">
                <img class="top-icons" src="../img/baglantilar.png" alt="">

            </div>
            <div class="ustmenu-icons">
                <img class="top-icons" src="../img/messages.png" alt="">

            </div>
            <div class="ustmenu-icons" style="margin-right: 35px;">
                <img class="top-icons" src="../img/bildirim.png" alt="">

            </div>
            <div class="top-menu-profil">
                <a href="#"><img src="../img/metincan-pp.jpg"></a>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="left-menu">
            <div class="left-bar-icons"> <img src="../img/home.png"> <a href="#" class="left-menu-profil">Anasayfa</a>
            </div>
            <div class="left-bar-icons"> <img src="../img/project.png"> <a href="#" class="left-menu-profil">Projeler</a></div>
            <div class="left-bar-icons"> <img src="../img/notification.png"> <a href="#" class="left-menu-profil">Duyurular</a>
            </div>
            <div class="left-bar-icons"> <img src="../img/vote.png"> <a href="#" class="left-menu-profil">Oylama</a>
            </div>
            <div class="left-bar-icons"> <img src="../img/destek.png"> <a href="#" class="left-menu-profil">Destek</a>
            </div>

        </div>



        <?php
        include("content.php");
        ?>
    </div>
</body>

</html>