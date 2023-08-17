<?php 

class jbMysql {

  function connectMysql(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "juniorbest";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conn;
}

function update($table, $query, $where){
//kisi_adi = 'Yusuf Sefa', kisi_soyadi = 'SEZER'
  $conn = $this->connectMysql();
  $sonuc = $conn->exec("UPDATE ".$table." SET ".$query." WHERE ".$where."");
  if ($sonuc > 0) {
  } else {
      echo "Herhangi bir kayıt güncellenemedi.";
  }
}

function list($select,$table, $query){
  $conn = $this->connectMysql();
  $sql = "SELECT ".$select." FROM ".$table." where ".$query."";
 
  $data = $conn->query($sql);
  return $data->fetch(PDO::FETCH_ASSOC);

}


function row_count($table,$query){
  $conn = $this->connectMysql();
  $sql = "SELECT COUNT(*) as count FROM ".$table." WHERE ".$query."";
  $res = $conn->query($sql);
  $count = $res->fetchColumn();

  return $count;
} 


  



function insert($table,$value_name,$data){
       
  // gelen data bilgisini anlamlı hale getiriyoruz.
        $join_data="";
        foreach ($data as $get_data){
            $add_join = "'$get_data',";
            $join_data = $join_data. $add_join;
        }
       
       $values_lenght=strlen($join_data)-1;

       substr($join_data,0,$values_lenght);
       $complete_join_data = substr($join_data,0,$values_lenght);

        try {
          $conn = $this->connectMysql();
          $sql = "INSERT INTO ".$table." (".$value_name.") VALUES (".$complete_join_data.")";
          $conn->exec($sql);
          return true;
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
        
}
}