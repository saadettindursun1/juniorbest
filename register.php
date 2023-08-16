<?php
require_once("functions/jb-encrypt.php");
require_once("functions/jb-mysql.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="mincss/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/juniorbest.js"></script>
</head>

<style>
.text-muted {
    display: none;
    color: red !important;
}
</style>

<body style="background: linear-gradient(248.22deg,#1E8075 -2.64%,#00473F 93.03%);">
    <div class="row mt-5">

        <div class="col-md-7 text-center">
            <img src="https://cdn.instawp.io/build/assets/authentication-img.f4bb9138.png" style="height: 70%;" alt="">
        </div>
        <div class="card p-5 border border-dark " style="max-height:730px !important;border-radius:30px;">
            <div class="card-header bg-white text-center">
                <h1>Hemen Kaydını Oluştur</h1>
            </div>
            <form method="POST" id="register-form">

                <div class="card-body">
                    <div class="form-group">
                        <label for="first-name">Ad</label>
                        <input type="text" name="first-name" class="form-control" id="first-name"
                            aria-describedby="first-name-warning" placeholder="Adınızı Giriniz">
                        <small id="first-name-warning" class="form-text text-muted">Adınızı girmediniz</small>
                    </div>

                    <div class="form-group">
                        <label for="last-name">Soyad</label>
                        <input type="text" name="last-name" class="form-control" id="last-name"
                            aria-describedby="last-name-warning" placeholder="Soyadınızı Giriniz">
                        <small id="last-name-warning" class="form-text text-muted">Soyadınızı girmediniz</small>
                    </div>

                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="email" name="mail" class="form-control" id="mail" aria-describedby="mail-warning"
                            placeholder="Mail Adresinizi Giriniz">
                        <small id="mail-warning" class="form-text text-muted">Girdiğiniz mail adresi yanlış
                            formatta</small>
                    </div>


                    <div class="form-group">
                        <label for="password">Parola</label>
                        <input type="password" name="mail" class="form-control" id="password"
                            aria-describedby="password-warning" placeholder="Parolanızı Giriniz">
                        <small id="password-warning" class="form-text text-muted">Uygun parola girmediniz</small>
                    </div>


                </div>
                <div class="card-footer bg-white">
                    <button type="button" name="user-register" id="user-register" class="btn btn-dark btn-block">Kayıt
                        Ol</button>
                </div>
            </form>
        </div>


    </div>

    <?php
$encrypt = new jbEncrypt();
$jb_mysql = new jbMysql();

$table = "users";
$value_name = "user_first_name, user_last_name , user_mail, user_password, user_login_type, user_info, user_register_date, user_veritification, user_veritification_code, user_veritification_validity,user_nickname,user_deleted";
$user_info = array(
    "genel bilgiler" => array(
        "bilgi1"=>"deneme",
        "bilgi2"=>"deneme",
        "bilgi3"=>"deneme",
    ),
    "ozel bilgiler" => array(
            "bilgi1"=>"deneme",
            "bilgi2"=>"deneme",
            "bilgi3"=>"deneme",
    )
);


$json_user_info = json_encode($user_info);
$data = array(
    "user_first_name" => "Metincan",
    "user_last_name" => "Çakmak",
    "user_mail" => "rexlerpanz@gmail.com",
    "user_password" => "Metincan",
    "user_login_type" => "1",
    "user_info" => $json_user_info,
    "user_register_date" => "2023-08-01",
    "user_veritification" => "1",
    "user_veritification_code" => "123456",
    "user_veritification_valididity" => "2023-08-16 12:14:44",
    "user_nickname" => "Metincan",
    "user_deleted" => "1"
);

// $ekle = $jb_mysql->insert($table,$value_name,$value,$data);
 //$ekle = $jb_mysql->insert($table,$value_name,$data);

 //echo $ekle;

?>
</body>

</html>