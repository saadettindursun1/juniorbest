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
        <div class="content-box ">

            <?php
            try {
                $proje_id = $_GET["proje-id"];

                $user_id = $_SESSION["user_id"];
                $query = " member_project_id=" . $proje_id . " and member_user_id =" . $_SESSION["user_id"] . "";
                $projects = $jb_mysql->row_count("members", $query);

                if ($projects != 1) {

                    header("Location:projeler.php");
                }
            } catch (Exception $e) {
                header("Location:projeler.php");
            }  ?>

        </div>
    </div>
</body>

</html>