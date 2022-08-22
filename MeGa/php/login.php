<?php 
session_start();
require "./config/config.php";

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = $db->query("SELECT * FROM user WHERE email = '{$email}'");
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = $db->query( "UPDATE user SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['user_id'] = $row['user_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>