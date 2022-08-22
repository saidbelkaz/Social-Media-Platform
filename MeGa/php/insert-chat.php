<?php 
    session_start();
    require "config/config.php";
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = $_SESSION['unique_id'];
        // $incoming_id = htmlspecialchars($_POST['incoming_id']);
        $id_user=$_GET['user_id'];
        if (!empty($_POST['msgs'])) {

            $message = htmlspecialchars($_POST['msgs']);
            if(!empty($message)){
                $sql = $db->query("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                    VALUES ({$id_user}, {$outgoing_id}, '{$message}')") or die();
                if($sql){
                    echo 'nadi';
                }else{
                    echo 'error';
                }
            }else{
                echo 'errror message khawi';
            }
        }
        
    }else{
        header("location: ../login.php");
    }


    
?>