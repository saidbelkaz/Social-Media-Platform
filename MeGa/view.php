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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>MeGaChat</title>
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="images/logo.jpg" alt="Logo" >
            <input type="text" placeholder="Search MeGaChat..">
        </div>

        <div class="nav-middle">
            <a href="#" class="active">
                <i class="fa fa-home"></i>
            </a>

            <a href="users.php">
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
                <li>
                    <label for="radio" class="enlign"></label>
                    <a href="profile.php"><img src="php/images/<?php echo $row['profile'];?>" alt="profile" class="profile"></a>
                    <?php if ($row['Verification']!=0) {?>
                        <p><?php echo $row['Fname']." ".$row['lname']." ";?><i class="fa fa-check-circle" id="verif"></i></p>
                    <?php }else{?>
                            <p><?php echo $row['Fname']." ".$row['lname']." ";?></p>
                    <?php }?>
                </li>
                <li>
                    <i class="fa fa-user-friends"></i>
                    <p>Friends</p>
                </li>
                <li>
                    <i class="fa fa-play-circle"></i>
                    <p>Videos</p>
                </li>
                <li>
                    <i class="fa fa-flag"></i>
                    <p>Pages</p>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <p>Groups</p>
                </li>
                <li>
                    <i class="fa fa-bookmark"></i>
                    <p>Bookmark</p>
                </li>
                <li>
                    <i class="fab fa-facebook-messenger"></i>
                    <p>Inbox</p>
                </li>
                <li>
                    <i class="fas fa-calendar-week"></i>
                    <p>Events</p>
                </li>
                <li>
                    <i class="fa fa-bullhorn"></i>
                    <p>Ads</p>
                </li>
                <li>
                    <i class="fas fa-hands-helping"></i>
                    <p>Offers</p>
                </li>
                <li>
                    <i class="fas fa-briefcase"></i>
                    <p>Jobs</p>
                </li>
                <li>
                    <i class="fa fa-star"></i>
                    <p>Favourites</p>
                </li>
            </ul>

            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Advance</a>
                <a href="#">More</a>
            </div>
        </div>


        <div class="middle-panel">

            <div class="post create">
                <div class="successfully"></div>
                <form  action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id='create-post' >
                    <div class="post-top">
                        <div class="dp">
                            <img src="php/images/<?php echo $row['profile'];?>" alt="profile">
                        </div>
                        <input type="text" name='input-post' id="input-post" placeholder="Create your own post...!"  />
                        <input type="file" name="image" id="image" hidden="hidden">
                        <button type="submit" name="submit" class="btn-post" id="btn-post" disabled>Create</button>
                    </div>
                
                </form>
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="fa fa-video"></i>
                        <span>Live video</span>
                    </div>
                    <div class="action" id='file'>
                        <i class="fa fa-image"></i>
                        <span id="span">Photo/Video</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-smile"></i>
                        <span>Feeling/Activity</span>
                    </div>
                </div>
            </div>
        <?php
            $sql2 = $db->query("SELECT Fname,lname,profile,statut,date_post,image FROM `post` INNER JOIN user WHERE post.user_id=user.user_id ORDER BY `date_post` DESC");
                if($sql2->rowCount() > 0){
                    $res =$sql2->fetchAll();
                    foreach($res as $post){?>
        
            <div class="post">
                <div class="post-top">
                    <div class="dp">
                        <img src="php/images/<?php echo $post['profile'];?>">
                    </div>
                    <div class="post-info">
                        <p class="name"><?php echo $post['Fname']." ".$post['lname'];?></p>
                        <span class="time"><?php echo $post['date_post'];?></span>
                    </div>
                    <i class="fas fa-ellipsis-h"></i>
                </div>

                <div class="post-content">
                    
                        <?php if(!empty($post['image'])){?>
                            <?php echo $post['statut'];?>
                            <img src="php/images/<?php echo $post['image'];?>">
                        <?php }else{?>
                            <?php echo $post['statut'];?>
                        <?php } ?>
                </div>
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="far fa-thumbs-up"></i>
                        <span>Like</span>
                    </div>
                    <div class="action">
                        <i class="far fa-comment"></i>
                        <span>Comment</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-share"></i>
                        <span>Share</span>
                    </div>
                </div>
            </div>
            <?php }
                }?>
        </div>

        <div class="right-panel">
            <div class="friends-section">
                <h4>Users </h4>
        <?php
            $sql3 = $db->query("SELECT * FROM `user` WHERE unique_id != {$_SESSION['unique_id']} ");
                if($sql3->rowCount() > 0){
                    $res =$sql3->fetchAll();
                    foreach($res as $rep){?>
                            <a class='friend' href="#">
                                <div class="dp">
                            <?php if ($rep['status'] == "Active now"){?>
                                        <label for="radio" class="enlignf"></label>
                            <?php } ?>

                            <img src="php/images/<?php echo $rep['profile'];?>" alt="profile">
                        </div>
                        <?php if ($rep['Verification'] != 0){?>
                                    <p class="name"><?php echo $rep['Fname']." ".$rep['lname']." ";?><i class="fa fa-check-circle" id="verif"></i></p>
                        <?php }else{ ?>
                            <p class="name"><?php echo $rep['Fname']." ".$rep['lname']." ";?></p>
                        <?php } ?>
                </a>
            <?php } } ?>
                
            </div>
        </div>
    </div>
</body>
<script src="javascript/view.js"></script>
<script src="javascript/post.js"></script>
</html>