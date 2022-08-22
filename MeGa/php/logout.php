<?php
session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "./config/config.php";
        $logout_id = htmlspecialchars($_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = $db->query("UPDATE user SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location:  Mega/view.php");
        }
    }else{  
        header("location:  Mega/login.php");
    }
?>