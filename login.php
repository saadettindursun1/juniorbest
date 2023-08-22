<?php
session_start();

require_once("class-loader.php");
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
        <div class="card p-5 border border-dark col-md-4 mt-5" style="max-height:600px !important;border-radius:30px;">
            <div class="card-header bg-white text-center">
                <h1>Giriş Yap</h1>
            </div>
            <form method="POST" id="register-form">

                <div class="card-body">                  

                    <div class="form-group">
                        <label for="mail">Mail veya Kullanıcı Adı</label>
                        <input type="text" name="login-user" class="form-control" id="login-user" aria-describedby="mail-warning"
                            placeholder="Mail veya Kullanıcı Adınızı Giriniz">
                    </div>


                    <div class="form-group">
                        <label for="loginpassword">Parola</label>
                        <input type="password" name="login-password" class="form-control" id="login-password"
                         placeholder="Parolanızı Giriniz">
                        
                    </div>
                    <small id="password-warning" class="form-text text-muted">Uygun parola girmediniz</small>

                </div>
                <div class="card-footer bg-white">
                    <input type="submit" value="Kayıt Ol" name="login-btn" id="user-register"
                        class="btn btn-lg btn-dark btn-block" readonly>
                </div>
                <?php

                    if(isset($_POST['login-btn'])){
                        $user_name = $_POST['login-user'];
                        $user_password = $_POST['login-password'];
                        
                        $jb_encrpyt = new jbEncrypt();

                        $code_user_name = $jb_encrpyt->code_encrypt($user_name);
                        $code_user_password = $jb_encrpyt->code_encrypt($user_password);

                        $jb_mysql = new jbMysql();
                        $query = "user_mail = '".$code_user_name."' OR user_nickname ='".$user_name."' AND user_password = '".$code_user_password."'";

                        $select = "user_mail,user_login_type,user_nickname,user_deleted";
                        $get_user = $jb_mysql->list($select,"users",$query);
                        
                       
                        if(isset($get_user["user_mail"])){
                            if($get_user["user_deleted"] == 1){
                                echo "Hesap kapatılmış.";
                            }
                            else{ //Giriş Yapıldıysa

                                session_destroy();
                                $_SESSION["user_mail"] = $jb_encrpyt->decode_encrypt($get_user["user_mail"]);
                                $_SESSION["user_login_type"] = $get_user["user_login_type"];
                                $_SESSION["user_nickname"] = $get_user["user_nickname"];
                                $jb_redirect = new userRedirect();
                                
                                $jb_redirect->redirect($get_user["user_login_type"]);
                            }                            
                        }
                        
                        if(!isset($get_user["user_mail"])){
                            echo "Giriş Başarısız.";
                        }
                    }

                ?>

            </form>
        </div>

    </div>
</body>

</html>