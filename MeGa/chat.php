<?php 
session_start();
require "php/config/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Chat</title>
</head>
<body>
<div class="wrapper">
    <section class="chat-area">
    <header>
        <?php 
            $user_id =htmlspecialchars($_GET['user_id']);
            $sql = $db->query("SELECT * FROM user WHERE unique_id = {$user_id}");
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
        }else{
            header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['profile']; ?>" alt="">
        <div class="details">
        <span><?php echo $row['Fname']. " " . $row['lname'] ?></span>
        <p><?php echo $row['status']; ?></p>
        </div>
    </header>
    <div class="chat-box">

    </div>
    <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
    </form>
    </section>
</div>

<script src="javascript/chat.js"></script>

</body>
</html>
