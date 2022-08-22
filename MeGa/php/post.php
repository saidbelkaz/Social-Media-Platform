<?php 
session_start();
require "./config/config.php";

    $input = htmlspecialchars($_POST['input-post']);

    if (!empty($_FILES['image'])) {

            
            $fileName=$_FILES['image']['name'];
            $fileTmpname=$_FILES[ 'image']['tmp_name'];
            $fileError=$_FILES['image']['error'];

            $fileExt=explode( '.',$fileName);
            $fileActualExt=strtolower(end($fileExt));
            $allowed=array('jpg','jpeg','png');
            if(in_array($fileActualExt,$allowed)){            
                if($fileError === 0){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestintion="images/". $fileNameNew;
                    move_uploaded_file($fileTmpname,$fileDestintion);
                    $stmt=$db->prepare("INSERT INTO `post`(`user_id`, `post_id`, `date_post`, `statut`, `image`) VALUES ('{$_SESSION["user_id"]}','',current_timestamp(),'{$input}','{$fileNameNew}')");
                    $stmt->execute();
                    if ($stmt) {
                        echo "Post created successfully";

                    }
                }else{
                    echo "on a une erreur de chargement de votre image !!";
                }
            }
        
    }
    if (!empty($input) && empty($_FILES['image'])==false){
        $stmt=$db->query("INSERT INTO `post`(`user_id`, `post_id`, `date_post`, `statut`, `image`) VALUES ('{$_SESSION["user_id"]}','',current_timestamp(),'{$input}','')");
        if ($stmt) {
            echo "Post created successfully";
        }
    }
    


?>

