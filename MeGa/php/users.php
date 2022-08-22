<?php
session_start();
require "php/config/config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $sql = $db->query("SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC");
    $output = "";
    if($sql->rowCount() == 0){
        $output .= "No users are available to chat";
    }elseif($sql->rowCount() > 0){
        include_once "data.php";
    }
    echo $output;
?>