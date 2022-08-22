<?php 
session_start();
require "./config/config.php";

$Fname = htmlspecialchars($_POST['Fname']);
$Lname = htmlspecialchars($_POST['Lname']);
$Email = htmlspecialchars($_POST['Email']);
if (!empty($Fname) && !empty($Lname) && !empty($Email)) {
    if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $sql=$db->query("UPDATE `user` SET `Fname`='{$Fname}',`lname`='{$Lname}',`email`='{$Email}' WHERE `user_id`='{$_SESSION['user_id']}'");
        echo 'successfully';
    
    }else{
        echo "L'adresse e-mail n'est pas valide";
    }
}else{
    echo 'You must fill in all the information';
}


?>

