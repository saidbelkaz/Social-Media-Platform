<?php 
session_start();
require "php/config/config.php";
if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}

$sql = $db->query("SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
if($sql->rowCount() > 0){
    $row =$sql->fetch();
}
$sql1 = $db->query("SELECT * FROM `user` WHERE unique_id != {$_SESSION['unique_id']} ");
if($sql1->rowCount() > 0){
    $row1 =$sql1->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/chat.css">
    <title>chat</title>
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="images/logo.jpg" alt="Logo" >
            <input type="text" placeholder="Search MeGaChat..">
        </div>

        <div class="nav-middle">
            <a href="view.php" >
                <i class="fa fa-home"></i>
            </a>

            <a href="users.php" class="active">
                <i class="fab fa-facebook-messenger"></i>
            </a>

            <a href="#">
                <i class="fa fa-play-circle"></i>
            </a>

            <a href="#">
                <i class="fa fa-users"></i>
            </a>
        </div>

        <div class="nav-right">
            <label for="radio" class="enlign"></label>
            <a href="profile.php"><img src="php/images/<?php echo $row['profile'];?>" alt="profile" class="profile"></a>

            <span href="#">
                <i class="fa fa-bell"></i>
            </span>
            
            <span class="drop" id="drop"> 
                <i class="fas fa-ellipsis-h"></i>
                <div class="menu" id="menu">
                    <ul id="ull">
                        <li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li class="butt"><a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id'] ?>"><i class="fa fa-lock"></i> Sign out</a></li>
                    </ul>
                </div>
            </span>
            
        </div>
    </nav>
    

    <div class="container">
        <div class="left-panel">
            <ul>
                <?php 
                foreach ($row1 as $key) { ?>
                <li value="<?php echo $key['user_id'];?>">
                    <?php if ($key['status']!="Offline now") {?>
                    <label for="radio" class="enlign"></label>
                    <?php }?>
                    <a href="profile.php"><img src="php/images/<?php echo $key['profile'];?>" alt="profile" class="profile"></a>
                    <?php if ($key['Verification']!=0) {?>
                        <p><?php echo $key['Fname']." ".$key['lname']." ";?><i class="fa fa-check-circle" id="verif"></i></p>
                    <?php }else{?>
                            <p><?php echo $key['Fname']." ".$key['lname']." ";?></p>
                    <?php }?>
                </li>
                <?php }?>
            </ul>
        </div>

        <div class="content">
                <div class="select" id="select">
                    <p>Choose the user</p>
                </div>
            <div class="global-chat" id="globalmsgs">
                <nav class="nav-chat">
                    <div class="nav-right" id="nav">

                        <!-- -------INNERHTML------- -->

                    </div>
                </nav>
                <section class="chat">
                        <article class="txtMsgs">
                        
                            <div class="text">No messages are available. Once you send message they will appear here.</div>
                        </article>
                        <form action="#" method="post" id="chatForm">
                            <input type="text" name="msgs" placeholder='message....'>
                            <button ><i class="fab fa-telegram-plane" ></i></button>
                        </form>
                </section>
            </div>
        </div>
    </div>

<script src="javascript/users.js"></script>
<script src="javascript/view.js"></script>
</body>
</html>
