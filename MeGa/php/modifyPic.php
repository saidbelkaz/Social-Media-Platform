<?php 
session_start();
require "./config/config.php";

if (isset($_FILES['edit-profile'])) {

    
    $fileName=$_FILES['edit-profile']['name'];
    $fileTmpname=$_FILES[ 'edit-profile']['tmp_name'];
    $fileError=$_FILES['edit-profile']['error'];
    $fileExt=explode( '.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){            
        if($fileError === 0){
        
            $fileNameNew=uniqid('',true).".".$fileActualExt;
            $fileDestintion="images/". $fileNameNew;
            move_uploaded_file($fileTmpname,$fileDestintion);
            $stmt=$db->prepare("UPDATE `user` SET `profile`='{$fileNameNew}' WHERE `user_id`='{$_SESSION['user_id']}'");
            $stmt->execute();
            if ($stmt) {
                echo "Profile Edit successfully";
                }
            }else{
                echo "on a une erreur de chargement de votre image !!";
            }
        }else{
            echo "Supported extensions 'jpg', 'jpeg' and 'png'";
        }
    
}else{
    echo "errror";
}

?>