<?php 

class jbMysql {

  function connectMysql(){
    $host = 'localhost';
    $db   = 'juniorbest';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
    return $pdo;
}


function insert($table,$value_name,$data){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "juniorbest";
        $value_name = "user_first_name, user_last_name , user_mail, user_password, user_login_type, user_info, user_register_date, user_veritification, user_veritification_code, user_veritification_validity,user_nickname,user_deleted";
      //  $values = "'1', '2' , '3', '4', '5', '6', '2023-08-01', '8', '9', '2023-08-16 12:14:44','1','1'";
       
        $join_data="";
        foreach ($data as $get_data){
            $add_join = "'$get_data',";
            $join_data = $join_data. $add_join;
        }
       
       $values_lenght=strlen($join_data)-1;

       substr($join_data,0,$values_lenght);
       $complete_join_data = substr($join_data,0,$values_lenght);

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO ".$table." (".$value_name.") VALUES (".$complete_join_data.")";
          $conn->exec($sql);
          echo "New record created successfully";
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
        

}
}