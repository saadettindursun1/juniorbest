<?php
require_once("class-loader.php");

$city_id = $_POST['city_id'];

if (isset($city_id)) {

    $jb_mysql = new jbMysql();
    $select = "town";
    $table = "town";
    $query = "city_id = '$city_id'";

    $get_town = $jb_mysql->list_select_all($select, $table, $query);



    echo json_encode($get_town);
}
