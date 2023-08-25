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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/juniorbest.js"></script>
</head>

<style>
.text-muted {
    display: none;
    color: red !important;
}
</style>

<body>
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
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password-warning" placeholder="Parolanızı Giriniz">
                        <small id="password-warning" class="form-text text-muted">Uygun parola girmediniz</small>
                    </div>


                </div>
                <div class="card-footer bg-white">
                    <input value="Kayıt Ol" name="user-register" id="user-register"
                        class="btn btn-lg btn-dark btn-block" readonly>
                </div>
                <?php


                @$btn = $_POST["user-register"]; //button basıldımı bilgisini alıyorum 
                
                if (isset($btn)) {  // button tıklandı ise 

                    $first_name = $_POST["first-name"];
                    $last_name = $_POST["last-name"];
                    $mail = $_POST["mail"];
                    $password = $_POST["password"];

                  
                    $jb_mysql = new jbMysql();
                    $jb_send_mail = new jbMailer();
                    $encrypt = new jbEncrypt();

                    $table = "users";
                    $value_name = "user_first_name, user_last_name , user_mail, user_password, user_login_type, user_info, user_register_date, user_veritification, user_veritification_code, user_veritification_validity,user_veritification_try,user_nickname,user_deleted";
                    $user_info = array(
                        "user_info" => array(
                            "birthday" => "",
                            "phone" => "",
                            "city" => "",
                            "town" => "",
                            "photo" => ""
                        ),
                        "status" => array(
                          "job" => "",
                          "education" =>"" 
                        ),
                        "bio"   => array(
                            "desc" => "",
                            "short_desc" =>"",
                            "cv" => "" 
                        ),
                        "tag" => "",
                        "asama" => "1"
                    );


                    //echo $first_name.$last_name.$mail.$password;


                    //doğrulama kodu oluşturma
                    $veritification_code =  rand(100000, 999999);

                    $json_user_info = json_encode($user_info);
                    $data = array(
                        "user_first_name" => $first_name,
                        "user_last_name" => $last_name,
                        "user_mail" => $encrypt->code_encrypt($mail),
                        "user_password" => $encrypt->code_encrypt($password),
                        "user_login_type" => "0",
                        "user_info" => $json_user_info,
                        "user_register_date" => date("Y-m-d"),
                        "user_veritification" => "0",
                        "user_veritification_code" => $veritification_code,
                        "user_veritification_valididity" => date("Y-m-d g:i:s"),
                        "user_veritification_try" =>  "3",
                        "user_nickname" => "nickname",
                        "user_deleted" => "0"
                    );

                    // $ekle = $jb_mysql->insert($table,$value_name,$value,$data);
                     $ekle = $jb_mysql->insert($table,$value_name,$data);

                     if($ekle){

                        $content = "<p>JuniorBest platformunda kayıt işlemini bitirmeniz için doğrulama kodunuz: <br> <strong>".$veritification_code."</strong></p>";

                        $jb_send_mail->sendMail($first_name,"saadettin.dursun1@gmail.com",$content,"Doğrulama Kodu");
                        echo "Kaydınız oluşturulmuştur.";
                        $_SESSION["loginType"]=2;

                        $_SESSION["mail"]= $mail;
                        header("Refresh:2;Url=dogrulama.php");

                     }
                }
                ?>

            </form>
        </div>


    </div>


</body>

</html>