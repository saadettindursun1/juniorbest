<?php
session_start();
if($_SESSION["loginType"] != 2) {
   header("Location:register.php");
}
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
input {
    width: 5%;
    margin-right: 30px;
    height: 90px;
    font-size: 40px;
    font-weight: 700;
    text-align: center;
}
</style>

<body style="background: linear-gradient(248.22deg,#1E8075 -2.64%,#00473F 93.03%);">
    <form method="POST">
        <div class="row justify-content-center align-items-center" style="margin-top: 200px;">
            <input type="text" name="code-1" class="input" maxlength="1" required>
            <input type="text" name="code-2" class="input" maxlength="1" required>
            <input type="text" name="code-3" class="input" maxlength="1" required>
            <input type="text" name="code-4" class="input" maxlength="1" required>
            <input type="text" name="code-5" class="input" maxlength="1" required>
            <input type="text" name="code-6" class="input" maxlength="1" required>
        </div>


        <div class="row justify-content-center align-items-center" style="margin-top: 30px;">
            <input type="submit" name="button" value="Doğrula" class="col-md-5 btn btn-block btn-success">
        </div>
        <div class="col-md-12 text-center mt-5">
            <?php
  $jb_mysql = new jbMysql();
  $jb_encrypt = new jbEncrypt();
  $jb_mail = new jbMailer();
  $mail =  $_SESSION["mail"];
  $code_mail = $jb_encrypt->code_encrypt($mail);
 
  $query = "user_mail='".$code_mail."'";
  $code = $jb_mysql->list("user_veritification_code,user_veritification_try", "users", $query);
  //echo $code["user_veritification_code"]." - ". $code["user_veritification_try"];

 if(isset($_POST["button"])) {
    $get_code = ""; 

    if($code["user_veritification_try"]==0) {
        echo "Hakkınız kalmadı yeniden kod isteyiniz.";
    }
    if($code["user_veritification_try"]!=0) {
     for ($i = 1; $i < 7; $i++) {
         $get_code = $get_code .  $_POST["code-" . $i];
     }
     if($get_code == $code["user_veritification_code"]) {
        $table = "users";
        $re_query = "user_veritification='1' ,user_login_type='1'";
        $re_where = "user_mail = '".$code_mail."'";
        header("Refresh:0;Url=bilgiler.php");
     
         $jb_mysql->update($table,$re_query,$re_where);

         echo "doğrulama başarılı";
     }
     if($get_code != $code["user_veritification_code"]) {
         echo "Başarısız Doğrulama <br>";
 
         $last_try = $code["user_veritification_try"] -1 ;
         $table = "users";
         $query = "user_veritification_try = '".$last_try."'";
         $where = "user_mail = '".$code_mail."'";
         $jb_mysql->update($table, $query, $where);
         echo "<br> Kalan Hakkınız: ".$last_try;

     }
 }
     
 }



 if(isset($_POST["re-send-code"])) { 
    $re_code = rand(100000,999999);
   $table = "users";
   $re_query = "user_veritification_code='".$re_code."' ,user_veritification_try='3'";
   $re_where = "user_mail = '".$code_mail."'";

    $jb_mysql->update($table,$re_query,$re_where);
    //kod oluşturma ve oluşan kodu mail gonderme
    $content = "Yeniden oluşturduğunuz doğrulama kodu: <br>".$re_code;
    $jb_mail->sendMail("",$mail,$content,"Doğrulama Kodu");

    echo "Doğrulama kodunuz mail adresinize gönderilmiştir.";

    

 }


             ?>
    </form>
    <br>

    <form method="post">
        <button type="submit" name="re-send-code" class="btn btn-outline-light">Yeniden Kod Gönder</button>
    </form>
    </div>
    </div>

</body>

<script>
const inputs = document.querySelectorAll('.input');

inputs.forEach((input, index) => {
    input.addEventListener('keyup', (event) => {
        const currentInput = event.target;
        const maxLength = parseInt(currentInput.getAttribute('maxlength'));

        if (currentInput.value.length === maxLength) {
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        }
    });
});
</script>

</html>