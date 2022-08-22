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
            <a href="view.php" >
                <i class="fa fa-home"></i>
            </a>

            <a href="#">
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
            <img src="php/images/<?php echo $row['profile'];?>" alt="profile" class="profile">

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
    <div class="container-profile">
        <div class="info">
            <img src="php/images/<?php echo $row['profile'];?>" alt="profile">
            <?php if ($row['Verification']!=0) {?>
                <p><?php echo $row['Fname']." ".$row['lname']." ";?><i class="fa fa-check-circle" id="verif"></i></p>
            <?php }else{?>
                    <p><?php echo $row['Fname']." ".$row['lname']." ";?></p>
            <?php }?>

        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id='edite-pic' >
            <input type="file" name="edit-profile" id="edit" hidden>
            <a href="#" id='but-edit'><i class="fa fa-camera"></i> Edit profile picture</a>
        </form>
        </div>
        <div class="nav-profile">
                <ul>
                    <li><a href="#" class="active-profile">Publications</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Photos</a></li>
                </ul>
        </div>
    </div>
    <div class="content">
            
        <div class="middle-panel" id='Publications' >
            <div class="post create" >
                <div class="successfully"></div>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id='create-post'>
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
            $sql2 = $db->query("SELECT Fname,lname,profile,statut,post_id,date_post,image FROM post INNER JOIN user WHERE post.user_id=user.user_id AND unique_id={$_SESSION['unique_id']} ORDER BY date_post DESC");
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
                    <input type="text" id='id-post' value='<?php echo $post['post_id'];?>' hidden>
                    <i class="fas fa-trash" id='delete'></i>
                    
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
                }else{?>
                    <h1>There are no posts</h1>
            <?php }?>
            </div>

            <div class="middle-panel" id='About' style='display:none;'>
            <form  action="php/modify.php" id="info" method="POST" enctype="multipart/form-data" >
                <table>
                    <tr>
                        <td colspan=2><p>Personal information</p></td>
                        <td><a id="Modify">Modify</a></td>
                    </tr>
                    <tr>
                        <td colspan=3><div class="successfully"></div></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td> <input type="text" value="<?php echo $row['Fname'];?>" name="Fname" disabled  > </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td > <input type="text" value="<?php echo $row['lname'];?>" name="Lname" disabled >  </td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td > <input type="text" value="<?php echo $row['email'];?>" name="Email" disabled >  </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" id="btn-up" name='update' value="Update" class="btn-up" disabled></td>
                    </tr>
                </table>
            </form>
            </div>
    </div>
</body>
<script src="javascript/profile.js"></script>
<script src="javascript/view.js"></script>
<script src="javascript/post.js"></script>
</html>