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

            <!-- Modal content -->
            <div class="project-form">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <h1>PROJE OLUŞTUR</h1>
                        <select name="project-type">
                            <option value="">
                                Projenin Türünü Seçiniz
                            </option>
                            <option>
                                Yazılım
                            </option>
                            <option>
                                Tasarım
                            </option>
                            <option>
                                Mimarlık
                            </option>
                            <option>
                                Diğer
                            </option>
                        </select>
                        <input type="text" name="project-name" placeholder="Proje Adı" required>

                        <textarea name="project-desc" class="" cols=" 30" rows="4" placeholder="Proje Açıklaması"
                            required></textarea>

                        <span>Proje Fotoğrafı (Zorunlu Değil)</span>
                        <input type="file" name="project-photo" id="info-photo" accept="image/*">
                        <br>
                        <button name="create-project" type="submit">Proje Oluştur</button>

                        <?php
                        if (isset($_POST["create-project"])) {


                            $project_photo = "null";
                            if ($_FILES["project-photo"]["name"] != "") {

                                $upload = $jb_uploads->uploads($_FILES, "project-photo", "../uploads/");

                                $project_photo = $upload;
                            }


                            $data = array(
                                "project_name" => $_POST["project-name"],
                                "project_builder" =>  $_SESSION["user_id"],
                                "project_description" => $_POST["project-desc"],
                                "project_type" => $_POST["project-type"],
                                "project_date" => date("Y-m-d H:i"),
                                "project_deleted" => "0",
                                "project_photo" => $project_photo,
                            );



                            $table = "project";
                            $value_name = "project_name,project_builder,project_description,project_type,project_date,project_deleted,project_photo";
                            $ekle = $jb_mysql->insert($table, $value_name, $data);
                            $insert_id = $ekle->lastInsertId();

                            $members_value = "member_project_id,member_user_id,member_status,member_type,member_deleted";
                            $members_data = array(
                                "member_project_id" => $insert_id,
                                "member_user_id" =>  $_SESSION["user_id"],
                                "member_status" => "0",
                                "member_type" => "builder",
                                "member_deleted" => "0",
                            );
                            $uye_ekle =  $jb_mysql->insert("members", $members_value, $members_data);
                        ?>
                        <div class="success-alert">
                            Proje Oluşturuldu
                        </div>
                        <?php
                        }
                        ?>


                    </div>

                </form>
            </div>

        </div>
    </div>
</body>

</html>