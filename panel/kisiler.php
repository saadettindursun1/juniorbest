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

    <div class="network-content">

        <h1>Kişileri Keşfet</h1>

        <div class="users">

            <?php
            $users = $jb_mysql->list_all("user_id,user_first_name,user_last_name,user_nickname,user_info", "users", "");
            foreach ($users as $user) {
                $user_info = json_decode($user['user_info']);
            ?>

                <div class="user-row">
                    <div class="user-row-image">
                        <img src="../<?php
                                        $user_photo_url = $user_info->user_info->photo;
                                        if (strlen($user_photo_url) < 1) {
                                            $user_photo_url = "img/user-photo.png";
                                        }
                                        echo $user_photo_url; ?>" alt="">
                    </div>
                    <div class="user-row-info">
                        <a class=""><?php echo $user["user_first_name"] . " " . $user["user_last_name"]; ?></a> <br>
                        <span class="nickname"><?php echo $user["user_nickname"]; ?></span>
                    </div>
                    <div class="user-add">
                        <button type="button" id="btn-<?php echo $user["user_id"]; ?>" class="add-btn">Ekle</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>