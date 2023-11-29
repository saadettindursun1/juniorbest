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
        <div class=" projects">

            <?php $order_by = " order by project_id desc";
            $projects = $jb_mysql->list_all("*", "project", $order_by);
            foreach ($projects as $project) {


            ?>
                <div class="proje-view">

                    <img src="<?php echo $project["project_photo"]; ?>" alt="">
                    <span class="project-name"> <?php echo $project["project_name"]; ?></span>
                    <span class="project-type"><?php echo $project["project_type"]; ?></span>
                    <span class="project-desc"><?php echo $project["project_description"]; ?></span>
                </div>
            <?php } ?>


        </div>
    </div>
</body>

</html>