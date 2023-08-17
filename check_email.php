<?php
require_once("class-loader.php");

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "juniorbest";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    // E-posta adresini kontrol et

    $encrypt = new jbEncrypt();
    $jb_mysql = new jbMysql();


    $code_email = $encrypt->code_encrypt($email);
    $table = "users";
    $query = "user_mail = '$code_email'";
   
   $row_count = $jb_mysql->row_count($table,$query);
    

        if ( $row_count > 0) {
            echo false;
        } else {
            echo true;
        }

}
?>