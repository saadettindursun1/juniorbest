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

    <?php include("topmenu.php"); ?>
    <div class="container">

        <?php include("left-menu.php"); ?>


        <div class="content-box proje-box">

            <a href="projelerim.php">
                <span>
                    <img src="../img/projects.png" alt="">
                </span>
                Projelerim
            </a>
            <a href="projeler.php">
                <span>
                    <img src="../img/search.png" alt="">

                </span>

                Proje Arama
            </a>
            <a href="proje-olustur.php">
                <span>
                    <img src="../img/add.png" alt="">

                </span>

                Proje Oluştur
            </a>

            <a href="" class="">
                <span>
                    <img src="../img/help-blue.png" alt="">

                </span>

                Yardım
            </a>
        </div>

    </div>
</body>

</html>