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

    <div class="profil-top-container">
        <img src="../img/profile-bg.jpg" class="profil-bg" alt="">

        <div class="profile-info">
            <img src="../<?php echo $user_info->user_info->photo ?>" class="profil-user" alt="">
            <div class="info-bar">
                <h2><?php echo $_SESSION["user_first_last_name"]; ?></h2> <br>
                <span> <a href=""><?php echo  $_SESSION["user_nickname"]; ?></a></span> <br><br>
                <?php

                echo $user_info->user_info->birthday;
                ?><br><br>

                <div>
                    <?php
                    $tags = explode(',', $user_info->tag);
                    foreach ($tags as $mytag) {
                        echo '<a href="tags.php?tag=' . $mytag . '"> #' . $mytag . '  </a>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <div class="my-post">
        <h1>GÖNDERİLERİM</h1>

        <?php
        $select = "*";
        $table = "post";
        $user_id = $_SESSION['user_id'];
        $query = "post_builder_id = '$user_id'";
        $posts = $jb_mysql->list_select_all($select, $table, $query);
        foreach ($posts as $post) {

            $get_post_photo = json_decode($post["post_photos"]);
        ?>
            <div class="content-box">

                <div class="content-header">
                    <div class="content-header-img">
                        <img src="../img/metincan-pp.jpg">
                    </div>
                    <div class="content-header-info">
                        <a href="#"><?php echo $_SESSION["user_first_last_name"]; ?></a>
                        <p><?php echo $post["post_date"] ?></p>
                    </div>
                </div>
                <div class="content">
                    <p id="postText"><?php echo $post["post_description"] ?></p>
                    <img src="<?php echo $get_post_photo->post_photo_1; ?>">
                </div>
                <div class="interactive">
                    <div class="abc">
                        <span><a href="#">Beğenmeler</a></span>
                        <div class="in-interactive">
                            <div class="like">
                                <input id="like-button" type="image" src="../img/no-like.png" value="submit">
                            </div>
                            <div class="comment">
                                <input type="image" src="../img/comment.png" value="submit">
                            </div>
                        </div>
                    </div>
                    <div class="in-interactive-right">
                        <div class="save">
                            <input id="save-button" type="image" src="../img/save.png" value="submit">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>