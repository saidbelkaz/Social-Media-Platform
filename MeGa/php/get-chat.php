<?php 
    session_start();
    require "config/config.php";
    if(isset($_SESSION['unique_id'])){
        // $outgoing_id = $_SESSION['unique_id'];
        // $incoming_id = htmlspecialchars($_POST['incoming_id']);
        $id_user=$_GET['user_id'];
        // $output = "";
        $outprofile = "";
        // $outerror = "";
        // $sql = "SELECT * FROM messages LEFT JOIN user ON user.unique_id = messages.outgoing_msg_id
        //         WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        //         OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

        // $query = $db->prepare($sql);
        // $query->execute();
        // if($query->rowCount() > 0){
        //     while($row = $query->fetch()){
        //         if($row['outgoing_msg_id'] === $outgoing_id){
        //             $output .= '<p>'. $row['msg'] .'</p>';
        //         }else{
        //             $output .= '<p class="you">'. $row['msg'] .'</p>';
        //         }
        //     }
        // }else{
        //     $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        // }
        // echo $output;

        if (!empty($id_user)) {
            
            $sql1 = "SELECT * FROM user WHERE user_id=$id_user";

            $query1 = $db->prepare($sql1);
            $query1->execute();
            if($query1->rowCount() > 0){
                while($row1 = $query1->fetch()){
                    $outprofile .='<label for="radio" class="enlign"></label>
                        <a href="profile.php"><img src="php/images/' .$row1["profile"].'" alt="profile" class="profile"></a> 
                        <p> '. $row1["Fname"]." ".$row1["lname"] .'</p>';
                    }
                }
            }
            echo $outprofile;

    }else{
        header("location: ../login.php");
    }

?>