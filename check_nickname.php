<?php
require_once("class-loader.php");

if (isset($_POST["nickname"])) {
    $nickname = $_POST["nickname"];

    // E-posta adresini kontrol et

    $jb_mysql = new jbMysql();
    $table = "users";
    $query = "user_nickname = '$nickname'";
   
   $row_count = $jb_mysql->row_count($table,$query);
    

        if ( $row_count > 0) {
            echo false;
        } else {
            echo true;
        }

}
?>