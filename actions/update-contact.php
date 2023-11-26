<?php
require_once("../class-loader.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $type = $_POST["type"];
    $jb_mysql = new jbMysql();

    session_start();
    if ($type == "1") {
        $table = "follow";
        $query = "follow_status = '" . "1" . "'";
        $where = "follow_send = " . $_SESSION["user_id"] . " AND follow_sender = " . $id;
        $jb_mysql->update($table, $query, $where);
    }

    if ($type == "0") {

        $query = "follow_send = " . $_SESSION["user_id"] . " AND follow_sender = " . $id;
        $jb_mysql->delete("follow", $query);
    }

    echo true;
}
