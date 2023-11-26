<?php
require_once("../class-loader.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $type = $_POST["type"];
    $jb_mysql = new jbMysql();

    session_start();
    if ($type == "add") {
        $table = "follow";
        $value_name = "follow_sender,follow_send,follow_status,follow_date,follow_accept_date";
        $data = array(
            "follow_sender" => $_SESSION["user_id"],
            "follow_send" => $id,
            "follow_status" => "0",
            "follow_date" => date("Y-m-d H:i"),
            "follow_accept_date" => date("Y-m-d H:i"),
        );
        $ekle = $jb_mysql->insert($table, $value_name, $data);
    }

    if ($type == "re_add") {

        $query = "follow_sender = " . $_SESSION["user_id"] . " AND follow_send = " . $id;
        $jb_mysql->delete("follow", $query);
    }

    echo true;
}
