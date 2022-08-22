<?php 
session_start();
require "./config/config.php";

$id_post=$_GET['post_id'];

if(!empty($id_post)){

    $sql=$db->query(" DELETE FROM `post` WHERE post_id=$id_post ");
    if ($sql) {
        echo "successfully";
    }
}

?>




