<?php
session_start();
$login_type = $_SESSION["user_login_type"];
if ($login_type != 2) {
    header("Location:../login.php");
}
require_once("../class-loader.php");
$jb_mysql = new jbMysql();
$jb_uploads = new jbUploads();

$my_id = $_SESSION["user_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junior Best</title>
    <link rel="stylesheet" href="../css/panel-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript" src="../js/panel.js"></script>

</head>

<body>
    <?php include("topmenu.php"); ?>

    <div class="network">
        <div class="my-network">
            <h2>Arkadaşlarım</h2>

            <div class="users">

                <?php
                $select = "follow_sender,follow_send";
                $table = "follow";
                $query = "(follow_sender = '$my_id' OR follow_send = '$my_id') AND follow_status = '1'";

                $my_contacts = $jb_mysql->list_select_all($select, $table, $query);
                foreach ($my_contacts as $contact) {

                    $who_id = $contact["follow_sender"];
                    if ($contact["follow_sender"] == $my_id) {
                        $who_id = $contact["follow_send"];
                    }
                    $contact_query = "user_id = '$who_id'";


                    $contact_info = $jb_mysql->list("user_first_name,user_last_name,user_nickname,user_info", "users", $contact_query);

                    $user_info = json_decode($contact_info['user_info']);
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
                        <a
                            class=""><?php echo $contact_info["user_first_name"] . " " . $contact_info["user_last_name"]; ?></a>
                        <br>
                        <span class="nickname"><?php echo $contact_info["user_nickname"]; ?></span>
                    </div>

                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="network-content">

            <h2>Kişileri Keşfet</h2>

            <div class="users">

                <?php
                $users = $jb_mysql->list_all("user_id,user_first_name,user_last_name,user_nickname,user_info", "users", "");
                foreach ($users as $user) {
                    $user_info = json_decode($user['user_info']);
                    $follow_user_id = $user["user_id"];

                    $query = "(follow_sender = '$my_id' AND follow_send = '$follow_user_id') OR (follow_sender = '$follow_user_id' AND follow_send = '$my_id')";

                    $row_count = $jb_mysql->row_count("follow", $query);


                    if ($row_count == 0 && $follow_user_id != $my_id) {


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
                        <button type="button" id="btn-<?php echo $user["user_id"]; ?>" class="add-btn">Arkadaş
                            Ekle</button>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="waiting-network">
            <h2>Bekleyen İstekler</h2>

            <div class="users">

                <?php
                $select = "follow_sender,follow_send";
                $table = "follow";
                $query = "follow_send = '$my_id' AND follow_status = '0'";

                $my_contacts = $jb_mysql->list_select_all($select, $table, $query);
                foreach ($my_contacts as $contact) {

                    $who_id = $contact["follow_sender"];
                    if ($contact["follow_sender"] == $my_id) {
                        $who_id = $contact["follow_send"];
                    }
                    $contact_query = "user_id = '$who_id'";


                    $contact_info = $jb_mysql->list("user_id,user_first_name,user_last_name,user_nickname,user_info", "users", $contact_query);

                    $user_info = json_decode($contact_info['user_info']);
                ?>

                <div class="user-row" id="row-<?php echo $contact_info["user_id"]; ?>">
                    <div class="user-row-image">
                        <img src="../<?php
                                            $user_photo_url = $user_info->user_info->photo;
                                            if (strlen($user_photo_url) < 1) {
                                                $user_photo_url = "img/user-photo.png";
                                            }
                                            echo $user_photo_url; ?>" alt="">
                    </div>
                    <div class="user-row-info">
                        <a
                            class=""><?php echo $contact_info["user_first_name"] . " " . $contact_info["user_last_name"]; ?></a>
                        <br>
                        <span class="nickname"><?php echo $contact_info["user_nickname"]; ?></span>
                    </div>
                    <div class="follow-accept">
                        <button type="button" id="btn-<?php echo $contact_info["user_id"]; ?>"
                            class="accept-btn select-btn">Onayla</button>
                        <button type="button" id="btn-<?php echo $contact_info["user_id"]; ?>"
                            class="decline-btn select-btn">Reddet</button>
                    </div>

                </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

</body>

</html>